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
                        <div class="col-lg-3 col-md-3 col-sm-4 align-center" v-for="folder in folders" :key="folder">
                            <a class="btn btn-dark folder-wrap" role="button" @click="insideFolder(folder)">
                                <span class="glyphicon glyphicon-folder-open folderIcons"></span>
                                {{ folder }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12" v-for="file in files" :key="file['name']">
                            <a v-bind:href="file['fileUrl']" class="btn btn-link text-dark">
                                <img v-bind:src="file['fileUrl']" alt="" width="150px"><br>
                                <span class="glyphicon glyphicon-file folderIcons"></span>
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
</template>

<script>
import Sidebar from '../Sidebar';
export default {
    components: {
        'sidebar': Sidebar
    },
    data(){
        return{
            folders:[],
            files:[],
            toUploadFile:{
                directoryName: '',
                file: undefined
            },
            createFolder: ''
        }
    },
    beforeCreate(){
            axios.get('/api/adminhome')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
        axios.get('/api/media/get').then(response => {
            this.folders = response.data.dirNames;
            this.files = response.data.filesArr;
        }).catch(error => {console.log(error)});
    },
    methods:{
        uploadFile(){
            const mypostparameters= new FormData();
            mypostparameters.append('file', this.toUploadFile.file);
            mypostparameters.append('directoryName', this.toUploadFile.directoryName);
            axios.post('/api/media/store', mypostparameters).then(response => {}).catch(error => {console.log(error)});
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
            axios.get('/api/media/get/?folder=' + this.toUploadFile.directoryName).then(response => {
            this.folders = response.data.dirNames;
            this.files = response.data.filesArr;
        }).catch(error => {console.log(error)});
        },
        newFolder(){
            axios.post('/api/media/createFolder', {currentFolder: this.toUploadFile.directoryName, newFolder: this.createFolder}).then(response => {}).catch(error => {console.log(error)});
        }
    }
    }
</script>


<style scoped>

</style>