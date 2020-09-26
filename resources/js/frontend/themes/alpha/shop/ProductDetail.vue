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
                    <img class="d-block w-100" src="http://via.placeholder.com/300x300" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/300x300" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/300x300" alt="Third slide">
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
                    <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                        <img class="d-block w-100 border border-dark shadow" src="http://via.placeholder.com/300x300">
                    </li>
                    <li data-target="#carousel-thumb" data-slide-to="1">
                        <img class="d-block w-100 border border-dark shadow" src="http://via.placeholder.com/300x300">
                    </li>
                    <li data-target="#carousel-thumb" data-slide-to="2">
                        <img class="d-block w-100 border border-dark shadow" src="http://via.placeholder.com/300x300">
                    </li>
                </ol>
                </div>
            </div>
            <div class="col-md-7">
                <h3>Reebok Men's Drifit Black T-shirt</h3>
                <h5 class="price"><s class="text-dander">$90</s> <span class="text-success">$79</span></h5>
                <hr />
                <p>Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
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
                <hr />
                <p></p>
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
            <div class="col-12 p-4"><hr /></div>
            <div class="col-12">
                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                <p>Cras ultricies ligula sed magna dictum porta. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla porttitor accumsan tincidunt.</p>
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
        mounted(){
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