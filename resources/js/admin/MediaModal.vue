<template>
  <transition name="modal-fade">
    <div class="modal-backdrop">
      <div class="modal"
        role="dialog"
        aria-labelledby="modalTitle"
        aria-describedby="modalDescription"
      >
        <header
          class="modal-header"
          id="modalTitle"
        >
          <slot name="header">
            Media Manager

            <button
              type="button"
              class="btn-close"
              @click="close"
              aria-label="Close modal"
            >
              x
            </button>
          </slot>
        </header>
        <section
          class="modal-body"
          id="modalDescription"
        >
          <slot name="body">
            <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <div class="col bg-faded my-3">
            <span>public/storage/{{ toUploadFile.directoryName }}</span>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input class="form-control" type="file" name="file" id="file" v-bind="toUploadFile.file" @change="Images_onFileChanged" aria-describedby="file-upload">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="file-upload" @click="uploadFile()">Upload</button>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" name="createFolder" id="createFolder" v-model="createFolder" aria-describedby="folder-create">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="folder-create" @click="newFolder()">Create A Folder</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-4 col-sm-6 col-lg-3 align-center" v-for="folder in folders" :key="folder">
                            <div class="m-1">
                                <button class="position-absolute btn btn-danger btn-sm" @click="deleteFolder(folder)">X</button>
                                <a class="btn btn-dark folder-wrap w-100 text-center p-2" role="button" @click="insideFolder(folder)">                                
                                {{ folder }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row p-2 border-top">
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4 col-sm-6 col-lg-3" v-for="file in files" :key="file['name']">
                            <div class="m-1 shadow">
                                <button class="position-absolute btn btn-danger btn-sm" @click="deleteFile(file['fileName'])">X</button>
                                <button class="btn btn-default" @click="selectedMe(file['fileUrl'])">
                                    <img v-bind:src="file['fileUrl']" v-bind:alt="file['fileName']" class="img-fluid"><br>
                                    <span class="file-name">{{ file['fileName'] }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          </slot>
        </section>
        <footer class="modal-footer">
          <slot name="footer">
            <button
              type="button"
              class="btn-green"
              @click="submit()"
              aria-label="Save"
            >
              Select Media
            </button>
            <button
              type="button"
              class="btn-green"
              @click="close"
              aria-label="Close"
            >
              Close
            </button>
          </slot>
        </footer>
      </div>
    </div>
  </transition>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    props: ['selectType'],
    data(){
        return{
            toUploadFile:{
                directoryName: '',
                file: undefined
            },
            createFolder: '',
            filepath: '',
            filepathArr: []
            
        }
    },
    computed: {
          ...mapGetters({
        folders: 'getMediaFolders',
        files: 'getMediaFiles',
      }),
    },
    beforeCreate(){
            axios.get('/api/adminhome')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
    },
    mounted(){
          this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName})
    },
    methods:{
        uploadFile(){
            const mypostparameters= new FormData();
            mypostparameters.append('file', this.toUploadFile.file);
            mypostparameters.append('directoryName', this.toUploadFile.directoryName);
            axios.post('/api/media/store', mypostparameters).then(response => {
                this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName})
            }).catch(error => {console.log(error)});
        },
        Images_onFileChanged (event) {
            this.toUploadFile.file = event.target.files[0];
        },
        insideFolder(folderName){
            if(this.toUploadFile.directoryName != ''){
            this.toUploadFile.directoryName += '/' + folderName;
            }
            else{
            this.toUploadFile.directoryName += folderName;
            }
            this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName});
        },
        newFolder(){
            axios.post('/api/media/createFolder', {currentFolder: this.toUploadFile.directoryName, newFolder: this.createFolder}).then(response => {
                this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName})
            }).catch(error => {console.log(error)});
        },
        deleteFolder(folder){
            axios.post('/api/media/deleteFolder', {currentFolder: this.toUploadFile.directoryName, folder}).then(response => {
                this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName})
            }).catch(error => {console.log(error)});
        },
        deleteFile(file){
            axios.post('/api/media/deleteFile', {currentFolder: this.toUploadFile.directoryName, file}).then(response => {
                this.$store.dispatch('updateMedia', {folder: this.toUploadFile.directoryName})
            }).catch(error => {console.log(error)});
        },
        selectedMe(name){
          switch(this.selectType){
            case 'single': this.filepath = name;break;
            case 'multi': this.filepathArr.push(name);break;
            default: this.filepath = name;break;
          }
        },
        submit(){            
          switch(this.selectType){
            case 'single': this.$emit('mediaSelect', this.filepath);break;
            case 'multi': this.$emit('mediaSelectArr', this.filepathArr);break;
          }
          this.filepath = '';
          this.filepathArr = [];
          this.$emit('close');
        },
        close() {
        this.$emit('close');
        }
    }
    }
</script>


<style scoped>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
    z-index: 1021;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
    height: 200px;
  }

  .btn-close {
    border: none;
    font-size: 20px;
    padding: 5px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>