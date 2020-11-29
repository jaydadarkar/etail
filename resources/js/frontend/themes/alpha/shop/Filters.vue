<template>
  <div class="filters">
      <div class="row">
          <div class="col-12">
              <h4>Categories</h4>
                <div class="card-body text-center p-1">
                    <div v-for="cat in categories" :key="cat.id" v-bind:class="{active: (filter_category == cat.id)}" class="p-2">
                        <a v-bind:value="cat.id" @click="filterCategory(cat.id)">{{ cat.product_category_name }}</a><br>
                    </div>
                </div>
          </div>
          <div class="col-12">
              <hr />
          </div>
          <div class="col-12">
              <h4>Price</h4>
                <div class="slidecontainer">
                  <input type="range" v-bind:min="filter_min_price" v-bind:max="filter_max_price" v-model="filter_price" class="slider" id="myRange" @change="filterPrice()">
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
                    <input type="radio" v-bind:name="att.attribute_name" v-bind:value="val" @change="filterAttribute(att.attribute_name,val)">
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
            filter_attributes: []
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
            let res = null;
            let containers = true;

            if(this.filter_attributes.length < 1){
                this.filter_attributes.push(attribute + ':' + value);
            }
            else{
               containers = this.filter_attributes.forEach(function(val,i,filter_attributes){
                    if(val.includes(attribute)){
                        filter_attributes[i] = attribute + ':' + value;
                        res = true;
                        return true;
                    }
                    else{
                        res = false;                        
                        return false;
                    }
                });
                if(!res && !containers) {
                    this.filter_attributes.push(attribute + ':' + value);
                }
            }
            this.$emit('filter_products', {attribute: this.filter_attributes.toString()});
        }
    }
}
</script>

<style scoped>
.active{
    color: white;
    background-color: var(--primary);
}
</style>