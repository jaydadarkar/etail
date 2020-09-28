import Home from './frontend/themes/alpha/Home.vue';
import Page from './frontend/themes/alpha/Page.vue';

import Dashboard from './frontend/themes/alpha/auth/Dashboard.vue';
import Login from './frontend/themes/alpha/auth/Login.vue';
import Logout from './frontend/themes/alpha/auth/Logout.vue';
import Register from './frontend/themes/alpha/auth/Register.vue';
import ResetPassword from './frontend/themes/alpha/auth/ResetPassword.vue';
import ConfirmNewPassword from './frontend/themes/alpha/auth/ConfirmNewPassword.vue';

import HelpdeskIndex from './frontend/themes/alpha/helpdesk/HelpdeskIndex.vue';
import HelpdeskDetail from './frontend/themes/alpha/helpdesk/HelpdeskDetail.vue';

import BlogIndex from './frontend/themes/alpha/blog/BlogIndex.vue';
import BlogDetail from './frontend/themes/alpha/blog/BlogDetail.vue';
import BlogCategory from './frontend/themes/alpha/blog/BlogCategory.vue';

import ProductIndex from './frontend/themes/alpha/shop/ProductIndex.vue';
import ProductCategory from './frontend/themes/alpha/shop/ProductCategory.vue';
import ProductDetails from './frontend/themes/alpha/shop/ProductDetail.vue';
import Cart from './frontend/themes/alpha/shop/Cart.vue';
import Checkout from './frontend/themes/alpha/shop/Checkout.vue';

import Admin from './admin/Admin.vue';
import ProductAdmin from './admin/shop/ProductIndex.vue'

import Example from './frontend/themes/alpha/Example.vue';
import NotFoundComponent from './frontend/themes/alpha/NotFound.vue';

export const routes = [
    { path: '/', component: Home, name: 'Home' },
    { path: '/pages/:page_name', component: Page, name: 'Page' },

    { path: '/dashboard', component: Dashboard, name: 'Dashboard' },
    { path: '/login', component: Login, name: 'Login' },
    { path: '/logout', component: Logout, name: 'Logout' },
    { path: '/register', component: Register, name: 'Register' },
    { path: '/reset', component: ResetPassword, name: 'ResetPassword' },
    { path: '/password/reset/:token', component: ConfirmNewPassword, name: 'ConfirmNewPassword' },

    { path: '/helpdesk', component: HelpdeskIndex, name: 'HelpdeskIndex' },
    { path: '/helpdesk/:id', component: HelpdeskDetail, name: 'HelpdeskDetail' },

    { path: '/blog', component: BlogIndex, name: 'BlogIndex' },
    { path: '/blog/:slug', component: BlogDetail, name: 'BlogDetail' },
    { path: '/blog-category/:category', component: BlogCategory, name: 'BlogCategory' },

    { path: '/shop', component: ProductIndex, name: 'ProductIndex' },
    { path: '/product-category/:category', component: ProductCategory, name: 'ProductCategory' },
    { path: '/product/:slug', component: ProductDetails, name: 'ProductDetails' },
    { path: '/cart', component: Cart, name: 'Cart' },
    { path: '/checkout', component: Checkout, name: 'Checkout' },

    { path: '/admin', component: Admin, name: 'Admin' },
    { path: '/admin/product', component: ProductAdmin, name: 'ProductAdmin' },
    
    { path: '/example', component: Example, name: 'Example' },

    { path: '*', component: NotFoundComponent, name: 'NotFoundComponent' }
];