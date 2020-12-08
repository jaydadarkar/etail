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
                <h5 class="price"><s class="text-danger">{{ product.product_mrp }}</s> <span class="text-success">{{ product.product_price }}</span></h5>
                <hr />
                <p>{{ product.product_short_desc }}</p>
                <div v-if="product.product_type == 'variable'">
                <br />
                <div v-for="vars in Object.keys(variation)" :key="vars">
                    <h5>{{vars}}</h5>
                    <select class="form-control" required @change="selectVariation(vars,$event.target.value)">
                        <option value="" selected disabled>Select {{vars}}</option>
                        <option v-bind:value="attribute" v-for="attribute in variation[vars]" :key="attribute">{{attribute}}</option>
                    </select>
                    <p></p>
                </div>
                </div>
                <hr />
                <div v-if="product.product_type != 'affiliate'">
                <div id="quantity" class="">
                    <div class="input-group">
                       <input type="button" value="-" class="button-minus" data-field="quantity" @click="decrement()">
                       <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field" v-model="product_quanttity">
                       <input type="button" value="+" class="button-plus" data-field="quantity" @click="increment()">
                       <input type="hidden" v-model="product_id" id="product_id">
                       <a class="btn btn-primary btn-lg ml-1">Add To Cart</a>
                       <a class="btn btn-danger btn-lg ml-1">Add To Wishlist</a>
                    </div>
                </div>
                </div>
                <div v-else>
                       <a class="btn btn-primary btn-lg ml-1" target="_blank" v-bind:href="product.product_link">Go To Shop</a>
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
                product:{},
                variation: {},
                selected_variation: [],
                product_id: '',
                product_quanttity: 1
            }
        },
        mounted(){

            axios.get('/api/product/show/' + this.$route.params.slug).then(response =>{
                this.product = response.data;
                this.product_id = this.product.id;
                if(this.product.product_type === "variable"){
                    let keys = this.product.variations[0].product_variation.split(",");
                    keys.forEach((item) => {
                        let name = item.split(":")[0];
                        this.variation[name] = [];
                    });
                    this.product.variations.forEach((item) => {
                        let vars = item.product_variation.split(",");
                        vars.forEach((item) => {
                            let single = item.split(":");
                            if(!this.variation[single[0]].includes(single[1])) this.variation[single[0]].push(single[1]);
                        });                        
                    });
                }
            }).catch(error => {console.log(error)});
        },
        methods: {
            increment(){
                this.product_quanttity = this.product_quanttity + 1;
            },
            decrement(){
                if (this.product_quanttity > 1) {
                    this.product_quanttity = this.product_quanttity - 1;
                } 
                else {
                    this.product_quanttity = 1;
                }
            },
            selectVariation(attribute, value){
                let selected = attribute + ":" + value;
                if(!this.selected_variation.includes(selected)) {
                    let match = undefined;
                    this.selected_variation.forEach((item, i) => {
                        var regx = new RegExp(attribute + ':', 'g');
                        if(item.match(regx)){
                            match = i;
                        };
                    });
                    if(match == undefined) this.selected_variation.push(selected)
                    else this.selected_variation[match] = selected;
                }
                axios.get('/api/product-variation/show/'+ this.product.product_sku +'/' + this.selected_variation.toString()).then(response => {
                    if(response.data != ""){
                        this.product_id = response.data.id;
                        document.querySelector(".price .text-danger").innerHTML = response.data.product_mrp;
                        document.querySelector(".price .text-success").innerHTML = response.data.product_price;
                    }
                }).catch(error => {
                    console.log(error);
                });
            }
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