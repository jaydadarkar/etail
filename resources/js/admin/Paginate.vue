<template>
  <div>
      <ul v-if="per_page < total" class="list-inline">
          <li v-for="(page,i) in totalPages" v-bind:key="i+1" class="btn btn-info m-1" @click="change(i+1)">{{ i+1 }}</li>
      </ul>
  </div>
</template>

<script>
export default {

    props: ['total', 'current', 'per_page'],
    data(){
        return {
            totalPages: '',
            pagination: ''
        }
    },
    updated(){
        let total = this.total;
        this.totalPages = Math.ceil(this.total / this.per_page);
    },
    methods: {
        change(i){
            this.$emit('pageChange', i)
        }
    }

}
</script>

<style>

</style>