<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Create New Page</p>
            <div class="row">
                <div class="col-md-12">
                    <h4>Create A Page</h4>
                    <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_category_name" placeholder="Page Name" v-model="page.page_title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_category_slug" placeholder="Page Slug" v-model="page.page_slug">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="product_category_desc" rows="3" placeholder="Page Desc" v-model="page.page_content"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_meta_keywords" placeholder="Page Meta Keywords" v-model="page.page_meta_keywords">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_cat_meta_desc" placeholder="Page Meta Desc" v-model="page.page_meta_desc">
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="createpage()">Create</button>
                </form>
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
            page:{
                page_title:'',
                page_slug:'',
                page_content: '',
                page_meta_keywords:'',
                page_meta_desc:'',
            }
        }
    },
    beforeCreate(){
            axios.get('/api/admin')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        },
    methods: {
        createpage(){
            axios.post('/api/admin/pages/create', this.page).then(response =>{this.$router.push({name: 'AdminPageIndex'})}).catch(error => {console.log(error)});
        }
    }
    }
</script>


<style scoped>

</style>