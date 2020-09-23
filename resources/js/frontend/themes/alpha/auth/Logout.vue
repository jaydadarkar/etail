<template>
</template>

<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
        mounted() {
                    axios.post('/api/logout').then(response => {
                    this.$router.push({name: 'Login'});
                    });
        }
    }
</script>
