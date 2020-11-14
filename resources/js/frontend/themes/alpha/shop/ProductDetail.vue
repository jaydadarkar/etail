<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 p-4"></div>
            <div class="col-md-5">
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                    <img class="d-block w-100" v-bind:src="product.product_primary_image" alt="First slide">
                    </div>
                    <div class="carousel-item" v-for="img in product.product_other_images" v-bind:key="img">
                        <img class="d-block w-100" v-bind:src="img">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                <ol class="carousel-indicators">
                    <li data-target="#carousel-thumb" class="active">
                        <img class="d-block w-100 border border-dark shadow" v-bind:src="product.product_primary_image">
                    </li>
                        <li data-target="#carousel-thumb" v-for="img in product.product_other_images" v-bind:key="img">
                            <img class="d-block w-100 border border-dark shadow" v-bind:src="img">
                        </li>
                </ol>
                </div>
            </div>
            <div class="col-md-7">
                <h3>{{ product.product_name }}</h3>
                <h5 class="price"><s class="text-dander">{{ product.product_mrp }}</s> <span class="text-success">{{ product.product_price }}</span></h5>
                <hr />
                <p>{{ product.product_short_desc }}</p>
                <div v-if="product.product_type == 'variable'">
                <br />
                <h5>Size</h5>
                <a href="" class="btn rounded-pill text-dark border">S</a>
                <a href="" class="btn rounded-pill text-dark border">M</a>
                <a href="" class="btn rounded-pill text-dark border">L</a>
                <a href="" class="btn rounded-pill text-dark border">XL</a>
                <p></p>
                <h5>Color</h5>
                <a href="" class="btn rounded-circle bg-primary p-3"></a>
                <a href="" class="btn rounded-circle bg-secondary p-3"></a>
                <a href="" class="btn rounded-circle bg-warning p-3"></a>
                <a href="" class="btn rounded-circle bg-success p-3"></a>
                <a href="" class="btn rounded-circle bg-danger p-3"></a>
                <p></p>
                </div>
                <hr />
                <p></p>
                <div v-if="product.product_type != 'affiliate'">
                <div id="quantity" class="">
                    <div class="input-group">
                       <input type="button" value="-" class="button-minus" data-field="quantity">
                       <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                       <input type="button" value="+" class="button-plus" data-field="quantity">
                       <a class="btn btn-primary btn-lg ml-1">Add To Cart</a>
                       <a class="btn btn-danger btn-lg ml-1">Add To Wishlist</a>
                    </div>
                </div>
                </div>
                <div v-else>
                       <a class="btn btn-primary btn-lg ml-1" target="_blank" v-bind:href="product.product_affiliate_link">Go To Shop</a>
                </div>
                <br />
                <div class="product_category">
                    <p>Category : <span v-for="cat in product.category_detail" :key="cat.id"><u>{{ cat.product_category_name }}</u>&nbsp;</span></p>
                </div>
                <div class="product_tags">
                    <p>Tags : <span>{{ product.product_tags }}</span></p>
                </div>
            </div>
            <div class="col-12 p-4"><hr /></div>
            <div class="col-12">
                <span v-html="product.product_long_desc"></span>
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
            return{
                product:{}
            }
        },
        mounted(){

            axios.get('/api/product/show/' + this.$route.params.slug).then(response =>{
                this.product = response.data;
            }).catch(error => {console.log(error)});

            function incrementValue(e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                if (!isNaN(currentVal)) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(1);
                }
                }

                function decrementValue(e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                if (!isNaN(currentVal) && currentVal > 1) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(1);
                }
                }

                $('.input-group').on('click', '.button-plus', function(e) {
                incrementValue(e);
                });

                $('.input-group').on('click', '.button-minus', function(e) {
                decrementValue(e);
                });
        }
    }
</script>

<style scoped>
.carousel-indicators li{
    width: 5rem;
}


#quantity input,
#quantity textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

#quantity input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

#quantity input::-webkit-outer-spin-button,
#quantity input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

#quantity .input-group {
  clear: both;
  position: relative;
}

#quantity .input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

#quantity .input-group .button-minus,
#quantity .input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

#quantity .input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

#quantity .button-plus {
  left: -13px;
}

#quantity input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

</style>