<template>
<div>
    <v-header></v-header>
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="#" @submit.prevent="login()">
                            <p class="h4 text-center mb-4">Sign in</p>
                            <label for="email" class="grey-text">Your email</label>
                            <input type="email" id="email" name="email" class="form-control" v-model="loginForm.email"/>
                            <br />
                            <label for="password" class="grey-text">Your password</label>
                            <input type="password" id="password" name="password" class="form-control" v-model="loginForm.password"/>
                            <br />
                            <div class="text-right">
                                <a href="/reset">Forgot Password?</a>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                <a class="btn btn-secondary btn-lg" href="/register">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <v-footer></v-footer>
</div>
</template>

<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
        data(){
            return{
                loginForm: {
                email: '',
                password: '',
                device_name: 'web',
                error: ''
                }
            }            
        },
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        methods: {
            login(){
                    axios.post('/api/login', this.loginForm).then(response => {
                    localStorage.setItem('isLoggedIn', '1');
                    localStorage.setItem('role', response.data.role);
                    this.$router.push({name: 'Dashboard'});
                    }).catch(error => {
                        this.error = error;
                    });
            }
        },
        mounted(){
            axios.get('/api/dashboard').then(response => {this.$router.push({name: 'Dashboard'})});
        }
    }
</script>