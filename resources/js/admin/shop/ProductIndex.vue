<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded py-3 flex-grow-1">
            <h2>Welcome Admin,</h2>
            <form action="#" @submit.prevent="createproduct()">
            <input type="text" class="form-control form-group" placeholder="Product Name" v-model="product.name">
            <input type="text" class="form-control form-group" placeholder="Product Category" v-model="product.category">
            <input type="number" class="form-control form-group" placeholder="Product Price" v-model="product.price">
            <input type="number" class="form-control form-group" placeholder="Product Quantity" v-model="product.quantity">
            <input type="text" class="form-control form-group" placeholder="Product Description" v-model="product.description">
            <button class="btn btn-primary btn-lg" type="submit">Create</button>
            </form>
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
            product: {
                name: '',
                category: '',
                price: 0,
                quantity: 1,
                description: '',
            }
        }
    },
    mounted(){
            axios.post('/api/admin')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    methods: {
        createproduct(){
            axios.post('/api/product/create/insert', this.product).then(response => {
                console.log(response);
                    }).catch(error => {
                        this.error = error;
                    });
        }
    }
}
</script>


<style scoped>
.quick-drafts{
    height: 200px;
    overflow-y: auto;
}
</style>