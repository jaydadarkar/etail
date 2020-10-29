<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Create New User</p>
            <div class="col-12 m-1">
                <input class='form-control' type='text' name='name' v-model="user.name" placeholder="Name" />
                <br />
                <input class='form-control' type='email' name='email' v-model="user.email" placeholder="Email" />
                <br />
                <input class='form-control' type='password' min="8" name='password' v-model="user.password" placeholder="Password" />
                <br />
                <button class="btn btn-primary" @click="createuser">Create</button>
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
            user:{
                name: '',
                email: '',
                password: '',
            }
        }
    },
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    methods: {
        createuser(){
            axios.post('/api/admin/users/create', this.user).then(response => {this.$router.push({name: 'AdminUsersIndex'})}).catch(error => {console.log(error)});
        }
    }
    }
</script>


<style scoped>

</style>