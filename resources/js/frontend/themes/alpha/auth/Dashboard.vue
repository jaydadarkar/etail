<template>
<div>
    <v-header></v-header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi {{ user.name }}. You are logged in.
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
                user: ''
            }
        },
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        beforeCreate(){
            axios.get('/api/dashboard').then(response => {
                    this.user = response.data;
                }).catch(error => {
                    if(error.response.status == 401) this.$router.push({name: 'Login'});
                });
        }
    }
</script>
