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

// Backend
import Admin from './admin/Admin.vue';

import AdminBlogDetail from './admin/blog/BlogDetails.vue'
import AdminBlogCreate from './admin/blog/BlogCreate.vue'
import AdminBlogIndex from './admin/blog/BlogIndex.vue'
import AdminBlogComments from './admin/blog/BlogComments.vue'

import AdminProductIndex from './admin/shop/ProductIndex.vue'
import AdminProductCreate from './admin/shop/ProductCreate.vue'
import AdminProductDetail from './admin/shop/ProductDetail.vue'
import AdminShipping from './admin/shop/Shipping.vue'
import AdminTax from './admin/shop/Tax.vue'

import AdminHelpdeskDetail from './admin/helpdesk/HelpdeskDetail.vue'
import AdminHelpdeskIndex from './admin/helpdesk/HelpdeskIndex.vue'

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

    // Backend

    { path: '/admin', component: Admin, name: 'Admin' },

    { path: '/admin/product', component: AdminProductIndex, name: 'AdminProductIndex' },
    { path: '/admin/product/create', component: AdminProductCreate, name: 'AdminProductCreate' },
    { path: '/admin/product/edit/:id', component: AdminProductDetail, name: 'AdminProductDetail' },
    
    { path: '/admin/blog', component: AdminBlogIndex, name: 'AdminBlogIndex' },
    { path: '/admin/blog/create', component: AdminBlogCreate, name: 'AdminBlogCreate' },
    { path: '/admin/blog/edit/:id', component: AdminBlogDetail, name: 'AdminBlogDetail' },
    { path: '/admin/blog/comments', component: AdminBlogComments, name: 'AdminBlogComments' },

    { path: '/example', component: Example, name: 'Example' },

    { path: '*', component: NotFoundComponent, name: 'NotFoundComponent' }
];