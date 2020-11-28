<template>
  <div class="filters">
      <div class="row">
          <div class="col-12">
              <h4>Categories</h4>
                <div class="card-body">
                    <div v-for="cat in categories" :key="cat.id">
                        <a v-bind:value="cat.id" @click="filterCategory(cat.id)"><label>&nbsp;&nbsp;{{ cat.product_category_name }}</label></a><br>
                    </div>
                </div>
          </div>
          <div class="col-12">
              <hr />
          </div>
          <div class="col-12">
              <h4>Price</h4>
                <div class="slidecontainer">
                  <input type="range" v-bind:min="filter_min_price" v-bind:max="filter_max_price" v-model:value="filter_price" class="slider" id="myRange" @change="filterPrice()">
                  <p>Price: <span id="demo"></span></p>
                </div>
          </div>
          <div class="col-12">
              <hr />
          </div>
        <div v-for="att in attribute" :key="att.id" class="col-12">
            <div class="col-12">
                <h4>{{ att.attribute_name }}</h4>
            </div>
            <div class="col-12">
                <div v-for="val in att.attribute_values.attribute_values.split(',')" :key="val" >
                    <input type="checkbox" v-bind:value="val" @change="filterAttribute(att.attribute_name,val)">
                    <label>&nbsp;&nbsp;{{ val }}</label><br>
                </div>
            </div>
            <div class="col-12"><hr /></div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            slider: '',
            categories: [],
            attribute: [],
            filter_category: '',
            filter_max_price: 999,
            filter_min_price: 199,
            filter_price: 500,
            filter_attributes: ''
        }
    },
    mounted(){
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
        this.filter_price = slider.value;

        slider.oninput = function() {
            this.filter_price = this.value;
            output.innerHTML = this.value;
        }

        axios.get('/api/product-category/get').then(response => {
            this.categories = response.data;
        }).catch(error => {console.log(error)});

        axios.get('/api/product-attributes/get').then(response => {
            this.attribute = response.data;
        }).catch(error => {console.log(error)});
    },
    methods: {
        filterCategory(id){
            this.filter_category = id;
            this.$emit('filter_products', {category: this.filter_category});
        },
        filterPrice(){
            this.$emit('filter_products', {min: this.filter_min_price, max: this.filter_price});
        },
        filterAttribute(attribute, value){
            this.filter_attributes += attribute + ':' + value;
            this.$emit('filter_products', {attribute: this.filter_attributes});
        }
    }
}
</script>

<style>

</style>