<template>
</template>

<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
        mounted() {
                    axios.post('/api/logout').then(response => {
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('role');
                    this.$router.push({name: 'Login'});
                    });
        }
    }
</script>
