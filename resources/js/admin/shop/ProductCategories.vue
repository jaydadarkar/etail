<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>        
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Product Categories</p>
            <div class="row">
                <div class="col-md-6">
                    <h4>Create A Category</h4>
                    <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_category_name" placeholder="Category Name" v-model="product_category.product_category_name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_category_slug" placeholder="Category Slug" v-model="product_category.product_category_slug">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="product_category_desc" rows="3" placeholder="Category Desc" v-model="product_category.product_category_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_meta_keywords" placeholder="Category Meta Keywords" v-model="product_category.product_cat_meta_keywords">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_meta_desc" placeholder="Category Meta Desc" v-model="product_category.product_cat_meta_desc">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_featured_image" placeholder="Category Image" v-model="product_category.product_cat_featured_image">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_parent_id" placeholder="Category Parent Id" v-model="product_category.product_cat_parent_id">
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="createcategory()">Create</button>
                </form>
                </div>
                <div class="col-md-6">
                    <div class="card w-100 mb-1" v-for="category in product_categories" :key="category.id">
                        <div class="card-header">
                            <span class="material-icons" @click="deletecategory(category['id'])">delete</span>
                            <span class="material-icons" @click="showModal(category)">edit</span>
                            {{ category['product_category_name'] }}
                        </div>
                        <div class="card-body">
                            {{ category['product_category_desc'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<modal v-show="isModalVisible" @close="closeModal" title="Edit Product Category" v-bind:body="this.categoryForm" url="/api/admin/product-category/update" state="updateProductCategories"></modal>
</div>
</template>

<script>
import Sidebar from '../Sidebar';
import Modal from '../Modal';
import { mapGetters } from 'vuex'

export default {
    components: {
        'sidebar': Sidebar,
        'modal' : Modal
    },
    data(){
        return{
            product_category:{
                product_category_name:"",
                product_category_slug:"",
                product_category_desc:"",
                product_cat_meta_keywords:"",
                product_cat_meta_desc:"",
                product_cat_featured_image:"",
                product_cat_parent_id:null
            },
            todelete:{
                id: ''
            },
            isModalVisible: false,
            categoryForm: ''
        }
    },
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
    },
    mounted(){
        axios.get('/api/product-category/get')
        .then(response => {
            this.$store.dispatch('updateProductCategories');
        })
        .catch(error => {console.log(error)});
    },
    computed: {
    ...mapGetters({
        product_categories: 'getProductCategories',
      }),
    },
    methods: {
        async createcategory (){
            await axios.post('/api/admin/product-category/store', this.product_category).then(response => {
                    this.$store.dispatch('updateProductCategories');
                    })
                .catch(error => {console.log(error)});
                this.product_category.product_category_name = "";
                this.product_category.product_category_slug = "";
                this.product_category.product_category_desc = "";
                this.product_category.product_cat_meta_keywords = "";
                this.product_category.product_cat_meta_desc = "";
                this.product_category.product_cat_featured_image = "";
                this.product_category.product_cat_parent_id = "";
        },
        async deletecategory(id){
                this.todelete.id = id;
                await axios.post('/api/admin/product-category/delete', this.todelete)
                .then(response => {
                    this.$store.dispatch('updateProductCategories');
                    })
                .catch(error => {console.log(error)});
            },
            showModal(category) {
                this.isModalVisible = true;
                this.categoryForm = `
                <input class='form-control' type='hidden' value="${category["id"]}" name='id' />
                <input class='form-control' type='text' value="${category["product_category_name"]}" name='product_category_name' />
                <input class='form-control' type='text' value="${category["product_category_slug"]}" name='product_category_slug' />
                <textarea class='form-control' name='product_category_desc'>${category["product_category_desc"]}</textarea>
                <input class='form-control' type='text' value="${category["product_cat_meta_keywords"]}" name='product_cat_meta_keywords' />
                <input class='form-control' type='text' value="${category["product_cat_meta_desc"]}" name='product_cat_meta_desc' />
                <input class='form-control' type='text' value="${category["product_cat_featured_image"]}" name='product_cat_featured_image' />
                <input class='form-control' type='text' value="${category["product_cat_parent_id"]}" name='product_cat_parent_id' />`;
            },
            closeModal() {
                this.isModalVisible = false;
            }
    }
}
</script>


<style scoped>

</style>