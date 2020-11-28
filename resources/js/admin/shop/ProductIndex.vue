<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded py-3 flex-grow-1">
            <h2>Welcome Admin,</h2><p>Product List&nbsp;&nbsp;<span @click="$router.push({name: 'AdminProductCreate'})" class="btn btn-primary">New</span></p>
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item shadow m-1" v-for="product in products" v-bind:key="product.id">
                                <div class="row">
                                <div class="col-12 col-md-4 col-lg-2 text-center">
                                    <img class="img-fluid" v-bind:src="product[0].product_primary_image">
                                </div>
                                <div class="col-12 col-md-8 col-lg-4">
                                    <h4><span class="title">{{ product[0].product_name }}</span></h4>
                                    <p>Main SKU :- <span class="main_sku">{{ product[0].product_sku }}</span></p>
                                    <a class="text-success" v-bind:href="'/product/' + product[0].product_slug">View</a>&nbsp;&nbsp;
                                    <a class="text-info" v-bind:href="'/admin/product/edit/' + product[0].product_slug">Edit</a>&nbsp;&nbsp;
                                    <a class="text-danger" @click="deleteProduct(product[0].id)">Delete</a>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <p>MRP :- <span class="mrp">{{ product[0].product_mrp }}</span></p>
                                    <p>Price :- <span class="price">{{ product[0].product_price }}</span></p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <p>Type :- <span class="type">{{ product[0].product_type }}</span></p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <p>Status :- <span class="status">{{ product[0].product_published }}</span></p>
                                </div>
                                </div>
                            </li>
                        </ul>
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
            products:{}
        }
    },
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
        axios.get('/api/product/get').then(response => {
            this.products = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        deleteProduct(id){
            axios.post('/api/admin/product/delete', {id: id}).then(response => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>