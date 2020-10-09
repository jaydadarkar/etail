<template>
  <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
            <div class="d-md-none text-center w-100 border-bottom mobile-head-border">
                <h3 class="text-white pt-2">Etail Admin</h3>
            </div>
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2 pl-lg-0 pr-lg-0">
                <div class="collapse navbar-collapse w-100">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link p-3 text-nowrap active text-center" href="/admin">
                                <span class="material-icons md-48">account_circle</span>
                                <span class="font-weight-bold"><h3>Admin</h3></span>
                            </a>
                            <div class="text-center">
                            <a class="btn btn-default text-light" href="/"><u>Home</u></a>
                            <a class="btn btn-default text-light" href="/logout"><u>Logout</u></a>                                
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3 dropdown-toogle" href="#" role="button" id="shop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons">shopping_cart</span> <span class="d-none d-md-inline"> Shop</span></a>
                            <div class="dropdown-menu bg-light dropdown-width rounded-0 shadow w-100" aria-labelledby="shop">
                                <a class="dropdown-item" href="/admin/product">Products</a>
                                <a class="dropdown-item" href="/admin/product/create">New</a>
                                <a class="dropdown-item" href="/admin/product-categories">Categories</a>
                                <a class="dropdown-item" href="/admin/product-attributes">Attributes</a>
                                <a class="dropdown-item" href="/admin/product-ratings">Ratings</a>
                                <a class="dropdown-item" href="/admin/product-questions">Questions</a>
                                <a class="dropdown-item" href="/admin/orders">Orders</a>
                                <a class="dropdown-item" href="/admin/coupons">Coupons</a>
                                <a class="dropdown-item" href="/admin/shipping">Shipping</a>
                                <a class="dropdown-item" href="/admin/taxes">Taxes</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="#" role="button" id="blog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons">create</span> <span class="d-none d-md-inline"> Blog</span></a>
                            <div class="dropdown-menu bg-light dropdown-width rounded-0 shadow w-100" aria-labelledby="shop">
                                <a class="dropdown-item" href="/admin/blog">Articles</a>
                                <a class="dropdown-item" href="/admin/blog/create">New</a>
                                <a class="dropdown-item" href="/admin/blog/comments">Comments</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="#" role="button" id="pages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons">layers</span> <span class="d-none d-md-inline"> Pages</span></a>
                            <div class="dropdown-menu bg-light dropdown-width rounded-0 shadow w-100" aria-labelledby="shop">
                                <a class="dropdown-item" href="/admin/pages">Pages</a>
                                <a class="dropdown-item" href="/admin/pages/create">New</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="/admin/media"><span class="material-icons">perm_media</span> <span class="d-none d-md-inline"> Media</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="#" role="button" id="users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons">account_circle</span> <span class="d-none d-md-inline"> Users</span></a>
                            <div class="dropdown-menu bg-light dropdown-width rounded-0 shadow w-100" aria-labelledby="shop">
                                <a class="dropdown-item" href="/admin/users">All Users</a>
                                <a class="dropdown-item" href="/admin/users/create">New</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="#" role="button" id="settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons">settings</span> <span class="d-none d-md-inline"> Settings</span></a>
                            <div class="dropdown-menu bg-light dropdown-width rounded-0 shadow w-100" aria-labelledby="shop">
                                <a class="dropdown-item" href="/admin/analytics">Analytics</a>
                                <a class="dropdown-item" href="/admin/bulkmails">Bulk Mails</a>
                                <a class="dropdown-item" href="/admin/helpdesk">Helpdesk</a>
                                <a class="dropdown-item" href="/admin/affiliates">Affiliates</a>
                                <a class="dropdown-item" href="/admin/settings">Site Settings</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
</template>

<script>
export default {

}
</script>

<style scoped>
    .nav-item .material-icons{
        vertical-align: bottom;
    }
    .mobile-head-border{
        border-color: #444 !important;
    }
    .dropdown-menu{
        min-width: 5rem !important;
    }
    .dropdown-item{
        padding: 0.5rem !important;
    }
    @media only screen and (min-width: 767px){
    .dropdown-width{
        position: relative !important;
    }
    .nav-item{
        border-bottom: 1px solid #444;
    }
    }
    @media only screen and (max-width: 767px){
    .dropdown-width{
        position: absolute;
    }
    }
</style>