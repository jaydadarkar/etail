<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Cart</h4>
            </div>
            <div class="col-md-4 d-md-none">
                <div class="card p-2">
                    <ul class="list-unstyled">
                        <li>Sub Total : {{ this.cart.subTotal }}</li>
                        <li>Tax : {{ this.cart.tax }}</li>
                        <li>Shipping : {{ this.cart.shipping }}</li>
                        <li>Coupon : {{ this.cart.coupon }}</li>
                    </ul>
                    <hr />
                    <ul class="list-unstyled">
                        <li class="h3">Total : {{ this.cart.total }}</li>
                        <li><button class="btn btn-primary btn-lg rounded-0 w-100 text-center">Checkout</button></li>
                    </ul>
                </div>                
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row" v-for="product in cart.products" :key="product.id">
                            <div class="col-6 col-lg-3">
                            <a v-bind:href="/product/ + product.product_slug" class="">
                                <img v-bind:src="product.product_primary_image" v-bind:alt="product.product_name" class="img-fluid">
                            </a>
                            </div>
                            <div class="col-6 col-lg-9">
                            <a v-bind:href="/product/ + product.product_slug" class="">
                                <ul class="list-unstyled">
                                    <li><h5>{{ product.product_name }}</h5></li>
                                    <li>SKU :- {{ product.product_sku }} | Variation :- {{ product.product_variation }}</li>
                                    <li>Type :- {{ product.product_type }}</li>
                                    <li>Quantity :- {{ product.quantity }}</li>
                                    <li><span class="strike-through">{{ product.product_mrp }}</span> {{ product.product_price }}</li>
                                </ul>
                            </a>
                            <span class="position-absolute" style="top: 1rem; right: 1rem;" @click="removeFromCart(product.id, product.quantity)">
                                <span class="material-icons">cancel</span>
                            </span>
                            </div>
                            <div class="col-12 p-2"></div>
                            <hr class="w-75 text-center" />
                            <div class="col-12 p-2"></div>
                        </div>
                        <div class="row text-right">
                            <div class="col-12">
                                <p>You Have {{ this.cart.totalQuantity }} products in your cart.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-2">
                    <ul class="list-unstyled">
                        <li>Sub Total : {{ this.cart.subTotal }}</li>
                        <li>Tax : {{ this.cart.tax }}</li>
                        <li>Shipping : {{ this.cart.shipping }}</li>
                        <li>Coupon : {{ this.cart.coupon }}</li>
                    </ul>
                    <hr />
                    <ul class="list-unstyled">
                        <li class="h3">Total : {{ this.cart.total }}</li>
                        <li><button class="btn btn-primary btn-lg rounded-0 w-100 text-center">Checkout</button></li>
                    </ul>
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

export default {
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        data(){
            return {
                cart: {
                    products: [{
                        id: '',
                        product_slug: '',
                        product_name: '',
                        product_sku: '',
                        product_variation: '',
                        product_type: '',
                        product_image: '',
                        product_quantity: '',
                        product_mrp: '',
                        product_price: '',
                    }],
                    totalQuantity: '',
                    tax: '',
                    shipping: '',
                    coupon: '',
                    subTotal: '',
                    total: '',
                }
            }
        },
        mounted(){
            axios.get('/api/cart').then(response => {
                this.cart.products = response.data.products;
                this.cart.totalQuantity = response.data.totalQuantity;
                this.cart.tax = response.data.tax;
                this.cart.shipping = response.data.shipping;
                this.cart.coupon = response.data.coupon;
                this.cart.subTotal = response.data.subTotal;
                this.cart.total = response.data.total;
            }).catch(error => {
                console.log(error);
            });
        },
        methods: {
            removeFromCart(product_id, product_quantity){
                axios.post('/api/cart/remove', {product_id: product_id, product_quantity: product_quantity}).then(response => {
                    console.log(response);
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
