<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Media</p>
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
                                <a v-bind:href="file['fileUrl']" class="btn btn-link text-dark">
                                    <img v-bind:src="file['fileUrl']" v-bind:alt="file['fileName']" class="img-fluid"><br>
                                    <span class="file-name">{{ file['fileName'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
import Sidebar from '../Sidebar';
import { mapGetters } from 'vuex'

export default {
    components: {
        'sidebar': Sidebar
    },
    data(){
        return{
            toUploadFile:{
                directoryName: '',
                file: undefined
            },
            createFolder: ''
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
        }
    }
    }
</script>


<style scoped>

</style>