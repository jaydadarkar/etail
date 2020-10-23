<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Pages</p>
            <div class="col-12 m-1" v-for="page in pages" :key="page.id">
                <div class="card-header">
                    <span class="material-icons" @click="deletepage(page['id'])">delete</span><span class="material-icons" @click="showModal(page)">edit</span>{{ page['page_title'] }}
                </div>
                <div class="card-body">
                    {{ page['page_content'] }}
                </div>
            </div>
        </div>
    </div>
</div>
<modal v-show="isModalVisible" @close="closeModal" title="Edit Page" v-bind:body="this.pageForm" url="/api/admin/pages/update"></modal>
</div>
</template>

<script>
import Sidebar from '../Sidebar';
import Modal from '../Modal';

export default {
    components: {
        'sidebar': Sidebar,
        'modal' : Modal
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
            isModalVisible: false,
            pageForm:''
        }
    },
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
            axios.get('/api/pages/get').then(response => {this.pages = response.data}).catch(error => console.log(error));
        },
    methods: {
        showModal(page) {
                this.isModalVisible = true;
                this.pageForm = `
                <input class='form-control' type='hidden' value="${page["id"]}" name='id' />
                <input class='form-control' type='text' value="${page["page_title"]}" name='page_title' />
                <input class='form-control' type='text' value="${page["page_slug"]}" name='page_slug' />
                <textarea class='form-control' name='page_content'>${page["page_content"]}</textarea>
                <input class='form-control' type='text' value="${page["page_meta_keywords"]}" name='page_meta_keywords' />
                <input class='form-control' type='text' value="${page["page_meta_desc"]}" name='page_meta_desc' />`;
            },
        closeModal() {
                this.isModalVisible = false;
            },
        deletepage(id){
            this.todelete.id = id;
            axios.post('/api/admin/pages/delete', this.todelete).then(response => {console.log(response)}).catch(error => {console.log(error)});
        }
    }
    }
</script>


<style scoped>

</style>