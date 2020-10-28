<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Edit Product</p>
            <div class="row">
                <div class="col-md-8">
                <input type="text" class="form-control form-group mb-0" placeholder="Product Name" v-model="product.name">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Slug:- <span class="slug">{{ this.app_url }}/abc</span></p>
                <input type="text" class="form-control form-group" placeholder="Product Short Description" v-model="product.short_desc" value="abc">
                <textarea class="form-control form-group" placeholder="Product Long Description" v-model="product.long_desc" rows="5">ABC</textarea>
                <div class="card">
                    <div class="card-header p-1">
                        <label for="type">Product Type</label>
                        <select name="type" id="type" class="form-control">
                        <option value="simple" selected>Simple</option>
                        <option value="variable">Variable</option>
                        </select></div>
                    <div class="card-body">
                        <div class="form-group row">
                        <div class="col-md-6">
                            <label for="mrp">Product MRP</label>
                            <input id="mrp" type="text" class="form-control m-1" placeholder="Product MRP" v-model="product.mrp" value="200">
                        </div>
                        <div class="col-md-6">
                            <label for="mrp">Product Price</label>
                            <input id="price" type="text" class="form-control m-1" placeholder="Product Price" v-model="product.price" value="189">
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
                        <option value="1" selected>Published</option>
                        <option value="0">Draft</option>
                        </select>
                        <br />
                        <input id="sku" type="text" class="form-control" placeholder="Main SKU" v-model="product.sku">
                        <br />
                        Created At :- <span class="created_at"></span><br />
                        Updated At :- <span class="updated_at"></span>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Category</div>
                    <div class="card-body">
                    <input type="checkbox" id="t-shirt" name="t-shirt" value="t-shirt" checked>
                    <label for="t-shirt"> T-shirt</label><br>
                    <input type="checkbox" id="Jeans" name="jeans" value="jeans">
                    <label for="jeans"> Jeans</label><br>
                    <input type="checkbox" id="shirt" name="shirt" value="shirt">
                    <label for="shirt"> Shirt</label><br>
                    <input type="checkbox" id="trouser" name="trouser" value="trouser">
                    <label for="trouser"> Trouser</label><br>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Main Image</div>
                    <div class="card-body">
                        <img class="img-fluid" src="https://via.placeholder.com/150x150">
                        <br />                        
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary">Select Image</a>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header p-1">Main Image</div>
                    <div class="card-body row">
                        <img class="img-fluid m-1" src="https://via.placeholder.com/50x50">
                        <img class="img-fluid m-1" src="https://via.placeholder.com/50x50">
                        <img class="img-fluid m-1" src="https://via.placeholder.com/50x50">
                        <br />                        
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary">Select Images</a>
                    </div>
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
            product: {
                name: 'Men\'s Round Neck Half T-shirt',
                category: '',
                mrp: 200,
                price: 189,
                quantity: 1,
                sku: 'abc',
                short_desc: 'abc',
                long_desc: 'abc',
                tags: 'abc,abcd'
            }
        }
    },
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    methods: {
        async createproduct(){
            await axios.post('/api/product/create/insert', this.product).then(response => {
                    }).catch(error => {
                        this.error = error;
                    });
        }
    }
}
</script>