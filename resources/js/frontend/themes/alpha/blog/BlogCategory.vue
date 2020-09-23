<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blog Category</div>

                    <div class="card-body">
                        I'm in blog category.
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

export default {
        components: {
            'v-header': Header,
            'v-footer': Footer
        }
    }
</script>
