<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Users</p>
            <div class="col-12 m-1" v-for="page in users" :key="page.id">
                <div class="row">
                    <div class="col-3"><span class="material-icons" @click="deletepage(page['id'])">delete</span><span class="material-icons" @click="showModal(page)">edit</span></div>
                    <div class="col-3">{{ page['email'] }}</div>
                    <div class="col-3">{{ page['name'] }}</div>
                    <div class="col-3">{{ page['role'] }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<modal v-show="isModalVisible" @close="closeModal" title="Edit User" v-bind:body="this.categoryForm" url="/api/admin/users/update" state=""></modal>
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
        return {
            users: {
                id: '',
                name: '',
                email: '',
            },
            isModalVisible: false,
            categoryForm: ''
        }
    },
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
        axios.get('/api/admin/users').then(response => {
            this.users = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        showModal(category) {
                this.isModalVisible = true;
                this.categoryForm = `
                <input class='form-control' type='hidden' value="${category["id"]}" name='id' />
                <input class='form-control' type='text' value="${category["name"]}" name='name' />
                <input class='form-control' type='text' value="${category["role"]}" name='role' />
                <input class='form-control' type='text' value="${category["email"]}" name='email' />`;
            },
            closeModal() {
                this.isModalVisible = false;
            }
    }
    }
</script>


<style scoped>

</style>