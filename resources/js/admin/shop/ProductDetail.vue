<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Create New Product</p>
            <div class="row">
                <div class="col-md-8">
                <input type="text" class="form-control form-group mb-0" placeholder="Product Name" v-model="product.product_name">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Slug:- <span class="slug">{{ app_url+ '/product/' +product.product_slug }}</span></p>
                <input type="text" class="form-control form-group" placeholder="Product Brand Name" v-model="product.product_brand">
                <input type="text" class="form-control form-group" placeholder="Product Short Description" v-model="product.product_short_desc">
                <textarea class="form-control form-group" placeholder="Product Long Description" v-model="product.product_long_desc" rows="5"></textarea>
                <div class="card">
                    <div class="card-header p-1">
                        <label for="type">Product Type</label>
                        <select name="type" id="type" class="form-control" v-model="product.product_type">
                        <option value="simple">Simple</option>
                        <option value="affiliate">Affiliate</option>
                        <option value="variable">Variable</option>
                        </select></div>
                    <div class="card-body">
                        <div class="form-group row">
                        <div class="col-md-12" v-if="product.product_type == 'affiliate'">
                            <label for="affiliate">Product Affiliate Link</label>
                            <input id="affiliate" type="text" class="form-control m-1" placeholder="Product Affiliate Link" v-model="product.product_affiliate_link">
                        </div>
                        <div class="col-md-4">
                            <label for="mrp">Product MRP</label>
                            <input id="mrp" type="text" class="form-control m-1" placeholder="Product MRP" v-model="product.product_mrp">
                        </div>
                        <div class="col-md-4">
                            <label for="mrp">Product Price</label>
                            <input id="price" type="text" class="form-control m-1" placeholder="Product Price" v-model="product.product_price">
                        </div>
                        <div class="col-md-4" v-if="product.product_type == 'simple'">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" type="text" class="form-control m-1" placeholder="Product Quantity" v-model="product.product_quantity">
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
                        <input id="meta_keywords" type="text" class="form-control m-1" placeholder="Comma Separated Meta Keywords" v-model="product.product_meta_keywords">
                        <br />
                        <label for="meta_desc">Product Meta Description</label>
                        <input id="meta_desc" type="text" class="form-control m-1" placeholder="Meta Description" v-model="product.product_meta_desc">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header">
                        Product Tags
                    </div>
                    <div class="card-body">
                        <label for="tags">Tags</label>
                        <input id="tags" type="text" class="form-control m-1" placeholder="Comma Separated Product Tags" v-model="product.product_tags">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header">
                        Product Dimensions
                    </div>
                    <div class="card-body">
                        <label for="dimensions">Dimensions</label>
                        <input id="dimensions" type="text" class="form-control m-1" placeholder="Product Dimensions" v-model="product.product_dimensions">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <label for="cars">Status</label>
                        <select v-model="product.product_published" id="status" class="form-control">
                        <option v-bind:value="1">Published</option>
                        <option v-bind:value="0" selected>Draft</option>
                        </select>
                        <br />
                        <input id="sku" type="text" class="form-control" placeholder="Main SKU" v-model="product.product_sku">
                        <br />                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Update" @click="updateproduct">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Category</div>
                    <div class="card-body">
                        <div v-for="cat in category" :key="cat.id">
                            <input type="checkbox" v-bind:value="cat.id" v-model="product.product_category"><label> {{ cat.product_category_name }}</label><br>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Main Image</div>
                    <div class="card-body">
                        <img v-bind:src="product.product_primary_image" class="img-fluid">                        
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" @click="showModal('single')">Select Image</a>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Secondary Images</div>
                    <div class="card-body row">
                        <div class="col-6" v-for="image in product.product_other_images" :key="image">
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
                        <input type="checkbox" v-model="product.product_featured"><label> Featured Product</label><br>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<mediamodal v-show="isModalVisible" @close="closeModal" title="Media Manager" state="updateMedia" @mediaSelect="pimage" @mediaSelectArr="simage" v-bind:selectType="mediaSelectType" v-bind:images="product.product_other_images"></mediamodal>
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
                id: '',
                product_name: '',
                product_sku: '',
                product_slug: '',
                product_category: [],
                product_brand: '',
                product_variation:[],
                product_short_desc: '',
                product_long_desc: '',
                product_type: 'simple',
                product_affiliate_link: '',
                product_mrp: '',
                product_price: '',
                product_quantity: 1,
                product_primary_image: '',
                product_other_images: [],
                product_meta_keywords: '',
                product_meta_desc: '',
                product_featured: false,
                product_published: 0,
                product_tags: '',
                product_dimensions: ''
            },
            category: {
                id: '',
                product_category_name: ''
            },
            attribute:{
                id: '',
                attribute_name: '',
                attribute_values: {}
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
        axios.get('/api/product/show/' + this.$route.params.slug).then(response => {
            this.product = response.data;
        }).catch(error => {console.log(error)});

        axios.get('/api/product-category/get').then(response => {
            this.category = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        async updateproduct(){
            await axios.post('/api/admin/product/update', this.product).then(response => {
                this.product.product_name = '';
                this.product.product_sku = '';
                this.product.product_slug = '';
                this.product.product_category = [];
                this.product.product_brand = '';
                this.product.product_variation = [];
                this.product.product_short_desc = '';
                this.product.product_long_desc = '';
                this.product.product_type = 'simple';
                this.product.product_mrp = '';
                this.product.product_price = '';
                this.product.product_quantity = 1;
                this.product.product_primary_image = '';
                this.product.product_other_images = [];
                this.product.product_meta_keywords = '';
                this.product.product_meta_desc = '';
                this.product.product_featured = false;
                this.product.product_published = 0;
                this.product.product_tags = '';
                this.product.product_dimensions = '';
                this.$router.push({name: 'AdminProductIndex'});
            }).catch(error => {console.log(error);});
        },

        showModal(type) {
                this.mediaSelectType = type;
                this.isModalVisible = true;
        },
        closeModal() {
                this.isModalVisible = false;
        },
        pimage: function(imgPath){
            this.product.product_primary_image = imgPath;
        },
        simage: function(imgArr){
            this.product.product_other_images = imgArr;
        },
        removeOtherImage(filename){
            this.product.product_other_images = this.product.product_other_images.filter(function(e) { return e !== filename });
        }
    }
}
</script>