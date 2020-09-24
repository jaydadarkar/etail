<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Forgot Password?</div>
                    <div class="card-body">
                       <form action="#" @submit.prevent="reset()">
                            <p class="h4 text-center mb-4">Reset Your Password</p>
                            <label for="email" class="grey-text">Your email</label>
                            <input type="email" id="email" name="email" class="form-control" v-model="form.email"/>
                            <br />
                            <div class="text-center mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Send Password Reset Link</button>
                            </div>
                        </form>
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
        data(){
            return{
                form: {
                email: '',
                error: ''
                }
            }
        },
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        methods: {
            reset(){
                axios.post('/api/reset', this.form)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                        this.error = error;
                    });
            }
        }
    }
</script>
