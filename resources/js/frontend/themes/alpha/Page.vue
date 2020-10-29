<template>
<div>
    <v-header></v-header>
    <div class="container-fluid">
        <div class="row">
            <span v-html="content"></span>
        </div>
    </div>
    <v-footer></v-footer>
</div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';

export default {
        components: {
            'v-header': Header,
            'v-footer': Footer
        },
        data(){
            return{
                content: '',
                slug: this.$route.params.slug
            }
        },
        mounted(){
            axios.get('/api/page/' + this.slug).then(response => {
                this.content = response.data.page_content
            }).catch();
        }
    }
</script>
