// Frontend
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

import AdminProductIndex from './admin/shop/ProductIndex.vue';
import AdminProductCreate from './admin/shop/ProductCreate.vue';
import AdminProductDetail from './admin/shop/ProductDetail.vue';
import AdminProductCategories from './admin/shop/ProductCategories.vue';
import AdminProductAttributes from './admin/shop/ProductAttributes.vue';
import AdminProductRatings from './admin/shop/ProductRatings.vue';
import AdminProductQuestions from './admin/shop/ProductQuestions.vue';
import AdminOrders from './admin/shop/Orders.vue';
import AdminOrderDetails from './admin/shop/OrderDetails.vue';
import AdminCoupons from './admin/shop/Coupons.vue';
import AdminShipping from './admin/shop/Shipping.vue';
import AdminTax from './admin/shop/Tax.vue';

import AdminBlogDetail from './admin/blog/BlogDetails.vue';
import AdminBlogCreate from './admin/blog/BlogCreate.vue';
import AdminBlogIndex from './admin/blog/BlogIndex.vue';
import AdminBlogComments from './admin/blog/BlogComments.vue';

import AdminPageEdit from './admin/pages/PageEdit.vue';
import AdminPageCreate from './admin/pages/PageCreate.vue';
import AdminPageIndex from './admin/pages/PageIndex.vue';

import AdminMedia from './admin/media/Media.vue';

import AdminUsersIndex from './admin/users/Users.vue';
import AdminUsersCreate from './admin/users/UsersCreate.vue';

import AdminMarketing from './admin/marketing/Analytics.vue';
import AdminBulkEmail from './admin/marketing/BulkMails.vue';
import AdminAffiliate from './admin/marketing/Affiliate.vue';

import AdminHelpdeskDetail from './admin/helpdesk/HelpdeskDetail.vue';
import AdminHelpdeskIndex from './admin/helpdesk/HelpdeskIndex.vue';

import AdminSettings from './admin/settings/Settings.vue';

import Example from './frontend/themes/alpha/Example.vue';
import NotFoundComponent from './frontend/themes/alpha/NotFound.vue';

export const routes = [
    
    // ----------- Frontend -----------
    { path: '/', component: Home, name: 'Home' },

    // Auth
    { path: '/dashboard', component: Dashboard, name: 'Dashboard' },
    { path: '/login', component: Login, name: 'Login' },
    { path: '/logout', component: Logout, name: 'Logout' },
    { path: '/register', component: Register, name: 'Register' },
    { path: '/reset', component: ResetPassword, name: 'ResetPassword' },
    { path: '/password/reset/:token', component: ConfirmNewPassword, name: 'ConfirmNewPassword' },

    // Pages
    { path: '/pages/:slug', component: Page, name: 'Page' },

    // Blog
    { path: '/blog', component: BlogIndex, name: 'BlogIndex' },
    { path: '/blog/:slug', component: BlogDetail, name: 'BlogDetail' },
    { path: '/blog-category/:category', component: BlogCategory, name: 'BlogCategory' },

    // Shop
    { path: '/shop', component: ProductIndex, name: 'ProductIndex' },
    { path: '/product-category/:category', component: ProductCategory, name: 'ProductCategory' },
    { path: '/product/:slug', component: ProductDetails, name: 'ProductDetails' },
    { path: '/cart', component: Cart, name: 'Cart' },
    { path: '/checkout', component: Checkout, name: 'Checkout' },

    // Helpdesk
    { path: '/helpdesk', component: HelpdeskIndex, name: 'HelpdeskIndex' },
    { path: '/helpdesk/:id', component: HelpdeskDetail, name: 'HelpdeskDetail' },


// ---------------------------------------------------------------------------------------------------------------------- //
// ---------------------------------------------------------------------------------------------------------------------- //
// ---------------------------------------------------------------------------------------------------------------------- //
// ---------------------------------------------------------------------------------------------------------------------- //



    // ----------- Backend -----------
    { path: '/admin', component: Admin, name: 'Admin' },

    // Shop
    { path: '/admin/product', component: AdminProductIndex, name: 'AdminProductIndex' },
    { path: '/admin/product/create', component: AdminProductCreate, name: 'AdminProductCreate' },
    { path: '/admin/product/edit/:id', component: AdminProductDetail, name: 'AdminProductDetail' },
    { path: '/admin/product-categories', component: AdminProductCategories, name: 'AdminProductCategories' },
    { path: '/admin/product-attributes', component: AdminProductAttributes, name: 'AdminProductAttributes' },
    { path: '/admin/product-ratings', component: AdminProductRatings, name: 'AdminProductRatings' },
    { path: '/admin/product-questions', component: AdminProductQuestions, name: 'AdminProductQuestions' },
    { path: '/admin/orders', component: AdminOrders, name: 'AdminOrders' },
    { path: '/admin/order/detail/:id', component: AdminOrderDetails, name: 'AdminOrderDetails' },
    { path: '/admin/coupons', component: AdminCoupons, name: 'AdminCoupons' },
    { path: '/admin/shipping', component: AdminShipping, name: 'AdminShipping' },
    { path: '/admin/taxes', component: AdminTax, name: 'AdminTax' },

    // Blog
    { path: '/admin/blog', component: AdminBlogIndex, name: 'AdminBlogIndex' },
    { path: '/admin/blog/create', component: AdminBlogCreate, name: 'AdminBlogCreate' },
    { path: '/admin/blog/edit/:id', component: AdminBlogDetail, name: 'AdminBlogDetail' },
    { path: '/admin/blog/comments', component: AdminBlogComments, name: 'AdminBlogComments' },

    // Pages
    { path: '/admin/pages', component: AdminPageIndex, name: 'AdminPageIndex' },
    { path: '/admin/pages/create', component: AdminPageCreate, name: 'AdminPageCreate' },
    { path: '/admin/pages/edit/:slug', component: AdminPageEdit, name: 'AdminPageEdit' },

    // Media
    { path: '/admin/media', component: AdminMedia, name: 'AdminMedia' },

    // Users
    { path: '/admin/users', component: AdminUsersIndex, name: 'AdminUsersIndex' },
    { path: '/admin/users/create', component: AdminUsersCreate, name: 'AdminUsersCreate' },

    // Helpdesk
    { path: '/admin/analytics', component: AdminMarketing, name: 'AdminMarketing' },
    { path: '/admin/bulkmails', component: AdminBulkEmail, name: 'AdminBulkEmail' },
    { path: '/admin/affiliates', component: AdminAffiliate, name: 'AdminAffiliate' },

    // Helpdesk
    { path: '/admin/helpdesk', component: AdminHelpdeskIndex, name: 'AdminHelpdeskIndex' },
    { path: '/admin/helpdesk/edit/:id', component: AdminHelpdeskDetail, name: 'AdminHelpdeskDetail' },

    // Settings
    { path: '/admin/settings', component: AdminSettings, name: 'AdminSettings' },

    // ----------- Testing -----------
    { path: '/example', component: Example, name: 'Example' },

    // ----------- 404 -----------
    { path: '*', component: NotFoundComponent, name: 'NotFoundComponent' }
];