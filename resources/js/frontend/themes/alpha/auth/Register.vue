<template>
<div>
    <v-header></v-header>
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="#" @submit.prevent="register()">
                            <p class="h4 text-center mb-4">Register</p>
                            <label for="name" class="grey-text">Your name</label>
                            <input type="name" id="name" name="name" class="form-control" v-model="registerForm.name"/>
                            <br />
                            <label for="email" class="grey-text">Your email</label>
                            <input type="email" id="email" name="email" class="form-control" v-model="registerForm.email"/>
                            <br />
                            <label for="password" class="grey-text">Your password</label>
                            <input type="password" id="password" name="password" class="form-control" v-model="registerForm.password"/>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary btn-lg" type="submit">Register</button><br />
                                Already have an account? <a href="/login">Login</a>
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
                registerForm: {
                name: '',
                email: '',
                password: '',
                device_name: 'web'
                }
            }            
        },
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        methods: {
            async register(){
                    await axios.post('/api/register', this.registerForm).then(response => {
                    this.$router.push({name: 'Dashboard'});                    
                    }).catch(error => {
                        this.error = error;
                    });
            }
        },
        beforeCreate(){
            axios.get('/api/dashboard')
            .then(response => {this.$router.push({name: 'Dashboard'})});
        }
    }
</script>
