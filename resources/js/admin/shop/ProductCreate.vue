<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Create New Product</p>
            <div class="row">
                <div class="col-md-8">
                <input type="text" class="form-control form-group mb-0" placeholder="Product Name" v-model="product.name">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Slug:- <span class="slug"></span></p>
                <input type="text" class="form-control form-group" placeholder="Product Short Description" v-model="product.short_desc">
                <textarea class="form-control form-group" placeholder="Product Long Description" v-model="product.short_desc" rows="5"></textarea>
                <div class="card">
                    <div class="card-header p-1">
                        <label for="type">Product Type</label>
                        <select name="type" id="type" class="form-control">
                        <option value="simple">Simple</option>
                        <option value="variable">Variable</option>
                        <option value="variable">Affiliate</option>
                        </select></div>
                    <div class="card-body">
                        <div class="form-group row">
                        <div class="col-md-4">
                            <label for="mrp">Product MRP</label>
                            <input id="mrp" type="text" class="form-control m-1" placeholder="Product MRP" v-model="product.mrp">
                        </div>
                        <div class="col-md-4">
                            <label for="mrp">Product Price</label>
                            <input id="price" type="text" class="form-control m-1" placeholder="Product Price" v-model="product.price">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" type="text" class="form-control m-1" placeholder="Product Quantity" v-model="product.quantity">
                        </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header">
                        Meta Data
                    </div>
                    <div class="card-body">
                        <label for="meta_keywords">Product Meta Keywords</label>
                        <input id="meta_keywords" type="text" class="form-control m-1" placeholder="Comma Separated Meta Keywords" v-model="product.meta_keywords">
                        <br />
                        <label for="meta_desc">Product Meta Description</label>
                        <input id="meta_desc" type="text" class="form-control m-1" placeholder="Meta Description" v-model="product.meta_desc">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header">
                        Product Tags
                    </div>
                    <div class="card-body">
                        <label for="tags">Tags</label>
                        <input id="tags" type="text" class="form-control m-1" placeholder="Comma Separated Product Tags" v-model="product.tags">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <label for="cars">Status</label>
                        <select name="status" id="status" class="form-control">
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                        </select>
                        <br />
                        <input id="sku" type="text" class="form-control" placeholder="Main SKU" v-model="product.sku">
                        <br />                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Publish">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Category</div>
                    <div class="card-body">
                        <div v-for="cat in category" :key="cat.id">
                            <input type="checkbox" v-bind:value="cat.id" name="product_category"><label> {{ cat.product_category_name }}</label><br>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Main Image</div>
                    <div class="card-body">
                        <img v-bind:src="product.primary_image" class="img-fluid">                        
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" @click="showModal('single')">Select Image</a>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Secondary Images</div>
                    <div class="card-body row">
                        <div class="col-6" v-for="image in product.other_images" :key="image">
                        <button class="btn btn-danger btn-sm" @click="removeOtherImage(image)">X</button>
                        <img v-bind:src="image" class="img-fluid">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" @click="showModal('multi')">Select Images</a>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Featured Product</div>
                    <div class="card-body row">
                        <br />                        
                        <input type="checkbox" name="featured"><label> Featured Product</label><br>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<mediamodal v-show="isModalVisible" @close="closeModal" title="Media Manager" state="updateMedia" @mediaSelect="pimage" @mediaSelectArr="simage" v-bind:selectType="mediaSelectType" v-bind:images="product.other_images"></mediamodal>
</div>
</template>

<script>
import Sidebar from '../Sidebar';
import MediaModal from '../MediaModal';

export default {
    components: {
        'sidebar': Sidebar,
        'mediamodal': MediaModal,
    },
    data(){
        return{
            product: {
                name: '',
                category: '',
                price: 0,
                quantity: 0,
                description: '',
                tags: '',
                primary_image: '',
                other_images: []
            },
            category: {
                id: '',
                product_category_name: ''
            },
            isModalVisible: false,
            mediaSelectType: ''
        }
    },
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    mounted(){
        axios.get('/api/product-category/get').then(response => {
            this.category = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        async createproduct(){
            await axios.post('/api/product/create/insert', this.product).then(response => {
                    }).catch(error => {
                        this.error = error;
                    });
        },

        showModal(type) {
                this.mediaSelectType = type;
                this.isModalVisible = true;
        },
        closeModal() {
                this.isModalVisible = false;
        },
        pimage: function(imgPath){
            this.product.primary_image = imgPath;
        },
        simage: function(imgArr){
            this.product.other_images = imgArr;
        },
        removeOtherImage(filename){
            this.product.other_images = this.product.other_images.filter(function(e) { return e !== filename });
        }
    }
}
</script>