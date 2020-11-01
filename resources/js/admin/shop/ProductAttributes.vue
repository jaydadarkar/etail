<template>
<div>
    <div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <sidebar></sidebar>
        <div class="col bg-faded my-3">
            <h2>Welcome Admin,</h2><p>Product Attributes</p>
            <div class="row">
                <div class="col-md-6">
                    <h4>Create An Attribute</h4>
                    <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_attribute_name" placeholder="Attribute Name" v-model="attribute_name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_attribute_slug" placeholder="Attribute Slug" v-model="attribute_slug">
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="createatteribute()">Create</button>
                </form>
                </div>
                <div class="col-md-6">
                    <div class="card w-100 mb-1" v-for="attribute in attributes" :key="attribute.id">
                        <div class="card-header">
                            <span class="material-icons" @click="deleteattribute(attribute['id'])">delete</span>
                            <span class="material-icons" @click="showModal(attribute)">edit</span>
                            {{ attribute['attribute_name'] }}
                        </div>
                        <div class="card-body">
                            {{ (attribute['attribute_values'] == null) ? '' : attribute['attribute_values'].attribute_values }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<modal v-show="isModalVisible" @close="closeModal" title="Edit Product Attributes" v-bind:body="this.attributeForm" url="/api/admin/product-attributes/update" state="updateProductAttributes"></modal>
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
            attribute_name:"",
            attribute_slug:"",
            isModalVisible: false,
            attributeForm: ''
        }
    },
    beforeCreate(){
            axios.get('/api/manager')
            .then(response => {})
            .catch(response =>{this.$router.push({name: 'Login'})});
    },
    mounted(){
        axios.get('/api/product-attributes/get')
        .then(response => {
            this.$store.dispatch('updateProductAttributes');
        })
        .catch(error => {console.log(error)});
    },
    computed: {
    ...mapGetters({
        attributes: 'getProductAttributes',
      }),
    },
    methods: {
        createatteribute(){
            axios.post('/api/admin/product-attributes/store', {attribute_name: this.attribute_name, attribute_slug: this.attribute_slug}).then(response => {
                    this.$store.dispatch('updateProductAttributes');
                    })
                .catch(error => {console.log(error)});
                this.attribute_name = "";
                this.attribute_slug = "";
        },
        deleteattribute(attribute){
            axios.post('/api/admin/product-attributes/delete', {id: attribute})
                .then(response => {
                    this.$store.dispatch('updateProductAttributes');
                    })
                .catch(error => {console.log(error)});
        },
        showModal(category) {
                this.isModalVisible = true;
                this.attributeForm = `
                <input class='form-control' type='hidden' value="${category["id"]}" name='id' />
                <input class='form-control' type='text' value="${category["attribute_name"]}" name='attribute_name' placeholder="Attribute Name" /><br />
                <input class='form-control' type='text' value="${category["attribute_slug"]}" name='attribute_slug' placeholder="Attribute Slug" /><br />
                <input class='form-control' type='text' value="${(category["attribute_values"] == null) ? '' : category["attribute_values"].attribute_values}" name='attribute_values' placeholder="Attribute Values" />`;
            },
        closeModal() {
                this.isModalVisible = false;
        }
    }
    }
</script>


<style scoped>

</style>