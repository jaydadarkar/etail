<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Pages</p>
            <div class="col-12 m-1" v-for="page in pages" :key="page.id">
                <div class="card-header">
                    <span class="material-icons" @click="deletepage(page['id'])">delete</span><span class="material-icons" @click="editpage(page['page_slug'])">edit</span><span class="material-icons" @click="viewpage(page['page_slug'])">visibility</span>{{ page['page_title'] }}
                </div>
                <div class="card-body">
                    {{ page['page_content'] }}
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
        'sidebar': Sidebar,
    },
    data(){
        return{
            pages:{
                id:'',
                page_title:'',
                page_slug:'',
                page_content: '',
                page_meta_keywords:'',
                page_meta_desc:'',
                created_at:'',
                updated_at:''
            },
            todelete:{
                id: ''
            },
        }
    },
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
            axios.get('/api/pages/get').then(response => {this.pages = response.data}).catch(error => console.log(error));
        },
    methods: {
        deletepage(id){
            this.todelete.id = id;
            axios.post('/api/admin/pages/delete', this.todelete).then(response => {console.log(response)}).catch(error => {console.log(error)});
        },
        editpage(slug){
            this.$router.push({name: 'AdminPageEdit', params: {slug: slug}})
        },
        viewpage(slug){
            this.$router.push({name: 'Page', params: {slug: slug}})
        }
    }
    }
</script>


<style scoped>

</style>