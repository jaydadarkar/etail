<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded py-3 flex-grow-1">
            <h2>Welcome Admin,</h2><p>Product List</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                <div class="col-md-1">
                                    <img class="img-fluid" src="https://via.placeholder.com/50x50">
                                </div>
                                <div class="col-md-5">
                                    <h4><span class="title">Men's Round Neck Half T-shirt</span></h4>
                                    <p>Main SKU :- <span class="main_sku">ABC123</span></p>
                                    <p>Variation :- <span class="variation">Size : M | Color : Red</span></p>
                                    <a class="text-success" href="/product/reebok-mens-drifit-black-t-shirt">View</a>&nbsp;&nbsp;
                                    <a class="text-info" href="/admin/product/edit/1">Edit</a>&nbsp;&nbsp;
                                    <a class="text-danger" href="#">Delete</a>
                                </div>
                                <div class="col-md-2">
                                    <p>MRP :- <span class="mrp">90</span></p>
                                    <p>Price :- <span class="price">79</span></p>
                                </div>
                                <div class="col-md-2">
                                    <p>Type :- <span class="type">Simple</span></p>
                                </div>
                                <div class="col-md-2">
                                    <p>Status :- <span class="status">Published</span></p>
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
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        }
}
</script>