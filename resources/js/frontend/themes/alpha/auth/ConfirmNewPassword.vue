<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Password</div>
                    <div class="card-body">
                        <form action="#" @submit.prevent="confirm()">
                            <p class="h4 text-center mb-4">Your New Password</p>
                            <label for="email" class="grey-text">Your password</label>
                            <input type="password" id="email" name="email" class="form-control" v-model="form.password" min="8"/>
                            <input type="hidden" id="token" name="token" class="form-control" v-model="form.token"/>
                            <br />
                            <div class="text-center mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
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
                password: '',
                token: this.$route.params.token,
                error: ''
                }
            }
        },
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        methods: {
            async confirm(){
                await axios.post('/api/password/confirm', this.form)
                .then(response => {
                })
                .catch(error => {
                        this.error = error;
                    });
            }
        }
    }
</script>
