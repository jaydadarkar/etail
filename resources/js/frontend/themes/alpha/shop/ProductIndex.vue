<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row p-4"></div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <filters @filter_products="filter_products"></filters>
            </div>
            <div class="col-md-9">
                <div class="row justify-content-end">
                    <div class="col-12 col-lg-4">
                        <select class="form-control" v-bind="order_by">
                            <option value="asc" selected>Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-0 m-0" v-for="product in products" :key="product[0].id">
                        <div class="card m-1" v-if="product[0].product_type == 'variable'">
                            <a class="text-decoration-none text-dark" v-bind:href="'/product/'+product[0].product_slug">
                            <div class="card-header p-0">
                                <img v-bind:src="product[0].product_primary_image" v-bind:alt="product[0].product_name" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h5>{{ product[0].product_name }}</h5>
                                <p class="price">
                                    <span class="text-dander" v-if="(product[0].product_mrp != 'null') && (product[0].product_mrp != undefined) && (product[0].product_mrp > product[0].product_price)">{{ product[0].product_mrp }}</span>
                                    <span class="text-success">{{ product[0].product_price }}</span>
                                </p>
                                <hr />
                                <div class="row text-center">
                                    <div class="col-12 p-0 m-0">
                                        <a v-bind:href="'/product/'+product[0].product_slug" class="btn btn-secondary">Select Options</a>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="card m-1" v-else>
                            <a class="text-decoration-none text-dark" v-bind:href="'/product/'+product[0].product_slug">
                            <div class="card-header p-0">
                                <img v-bind:src="product[0].product_primary_image" v-bind:alt="product[0].product_name" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h5>{{ product[0].product_name }}</h5>
                                <p class="price">
                                    <span class="text-dander" v-if="(product[0].product_mrp != 'null') && (product[0].product_mrp != undefined) && (product[0].product_mrp > product[0].product_price)">{{ product[0].product_mrp }}</span>
                                    <span class="text-success">{{ product[0].product_price }}</span>
                                </p>
                                <hr />
                                <div class="row text-center">
                                    <div class="col-6 p-0 m-0">
                                        <a href="#" class="btn btn-primary">Add To Cart</a>
                                    </div>
                                    <div class="col-6 p-0 m-0">
                                        <a v-bind:href="'/product/'+product[0].product_slug" class="btn btn-secondary">View Details</a>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <v-footer></v-footer>
</div>
</template>

<script>
import Header from '../components/Header';
import Footer from '../components/Footer';
import Filters from './Filters'

export default {
        components: {
            'v-header': Header,
            'v-footer': Footer,
            'filters': Filters
        },
        data(){
        return{
            products: {
                id: '',
                product_name: '',
                product_sku: '',
                product_slug: '',
                product_category: [],
                product_brand: '',
                product_variation:[],
                product_short_desc: '',
                product_long_desc: '',
                product_type: '',
                product_affiliate_link: '',
                product_mrp: '',
                product_price: '',
                product_quantity: '',
                product_primary_image: '',
                product_other_images: [],
                product_meta_keywords: '',
                product_meta_desc: '',
                product_featured: '',
                product_published: '',
                product_tags: '',
                product_dimensions: '',
                variations: []
            },
            order_by: '',
            url: '/api/product/get?'
        }
    },
    mounted(){
        axios.get('/api/product/get').then(response => {
            this.products = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        filter_products: function({category, min, max, attribute}){
            if(category != undefined && category != null && category != ''){
                this.url += 'category=' + category.toString() + '&&';
            }
            if((min != undefined && min != null && min != '') && (max != undefined && max != null && max != '')){
                this.url += 'min=' + min +'&&' + 'max='+ max +'&&';
            }
            if(attribute != undefined && attribute != null && attribute != ''){
                this.url += 'attribute=' + attribute.toString() + '&&';
            }
            axios.get(this.url).then(response => {
                this.products = response.data;
            }).catch(error => {console.log(error)});
        }
    }
}
</script>

<style scoped>
.price{
    font-size: 1.2rem;
}
</style>
