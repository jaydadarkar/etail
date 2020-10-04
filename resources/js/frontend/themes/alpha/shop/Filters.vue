<template>
  <div class="filters">
      <div class="row">
          <div class="col-12">
              <h4>Categories</h4>
                <p>T-shirts</p>
                <p>Jeans</p>
                <p>Shirts</p>
                <p>Trousers</p>
          </div>
          <div class="col-12">
              <hr />
          </div>
          <div class="col-12">
              <h4>Price</h4>
                <div class="slidecontainer">
                  <input type="range" min="299" max="899" value="400" class="slider" id="myRange">
                  <p>Price: <span id="demo"></span></p>
                </div>
          </div>
          <div class="col-12">
              <hr />
          </div>
          <div class="col-12">
              <h4>Sizes</h4>
              <p>
                <a href="" class="btn rounded-pill text-dark border">S</a>
                <a href="" class="btn rounded-pill text-dark border">M</a>
                <a href="" class="btn rounded-pill text-dark border">L</a>
                <a href="" class="btn rounded-pill text-dark border">XL</a>
              </p>
          </div>
          <div class="col-12">
              <hr />
          </div>
          <div class="col-12">
              <h4>Colors</h4>
              <p>
                <a href="" class="btn rounded-circle bg-primary p-3"></a>
                <a href="" class="btn rounded-circle bg-secondary p-3"></a>
                <a href="" class="btn rounded-circle bg-warning p-3"></a>
                <a href="" class="btn rounded-circle bg-success p-3"></a>
                <a href="" class="btn rounded-circle bg-danger p-3"></a>
              </p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            slider: ''
        }
    },
    mounted(){
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
              output.innerHTML = this.value;
        }
    }
}
</script>

<style>

</style>