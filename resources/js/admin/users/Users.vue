<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Users</p>
            
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
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        }
    }
</script>


<style scoped>

</style>