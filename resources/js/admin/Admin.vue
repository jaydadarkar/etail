<template>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Password</div>

                    <div class="card-body">
                        I'm in {{ message }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

export default {
            data(){
                return{
                message: ''
                }
            },
            mounted(){
            axios.post('/api/admin')
            .then(response => {this.message = response.data.message})
            .catch(response =>{this.$router.push({name: 'Login'})});
        }
    }
</script>
