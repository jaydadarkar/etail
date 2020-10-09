<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Product Attributes</p>
            
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
            axios.get('/api/manager')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        }
    }
</script>


<style scoped>

</style>