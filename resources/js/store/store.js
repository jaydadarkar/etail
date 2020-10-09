import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
      notes: [],
      cart: [],
      wishlist: [],
      product_categories: [],
      product_attributes: []
    },
    getters: {
      getNote: state => {
        return state.notes;
      },
      getCart: state => {
        return state.cart;
      },
      getWishlist: state => {
        return state.wishlist;
      },
      getProductCategories: state => {
        return state.product_categories;
      },
      getProductAttributes: state => {
        return state.product_attributes;
      }
    },
    mutations: {
      updateQuickNotes: (state, data) => {        
        state.notes = data;
      },
      updateCartM: (state, data) => {        
        state.cart = data;
      },
      updateWishlist: (state, data) => {        
        state.wishlist = data;
      },
      updateProductCategoriesM: (state, data) => {        
        state.product_categories = data;
      },
      updateProductAttributesM: (state, data) => {        
        state.product_attributes = data;
      }
    }, 
    actions: {
      updateNote: ({ commit }) => {
        setTimeout(() => {
          axios.post('/api/quicknote/get')
        .then(response => {commit('updateQuickNotes', response.data)})
        .catch(error => console.log(error));
        }, 2);
      },
      updateCart: ({ commit }) => {
        setTimeout(() => {
          axios.post('/api/cart/get')
        .then(response => {commit('updateCartM', response.data)})
        .catch(error => console.log(error));
        }, 2);
      },
      updateWishlist: ({ commit }) => {
        setTimeout(() => {
          axios.post('/api/wishlist/get')
        .then(response => {commit('updateWishlistM', response.data)})
        .catch(error => console.log(error));
        }, 2);
      },
      updateProductCategories: ({ commit }) => {
        setTimeout(() => {
          axios.get('/api/admin/product-category')
        .then(response => {commit('updateProductCategoriesM', response.data)})
        .catch(error => console.log(error));
        }, 2);
      },
      updateProductAttributes: ({ commit }) => {
        setTimeout(() => {
          axios.post('/api/admin/product-attributes')
        .then(response => {commit('updateProductAttributesM', response.data)})
        .catch(error => console.log(error));
        }, 2);
      }
    }
  });