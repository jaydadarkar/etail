<template>
<nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Etail</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/shop">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pages/about-us">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pages/contact-us">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/blog">Blogs</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="btn btn-default material-icons text-white">shopping_cart</span>
          Cart
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">No Products In Cart</a>
        </div>
      </li>
      <li class="nav-item text-white border-right mx-2"></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="btn btn-default material-icons text-white">account_circle</span>
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" v-bind:class="[dashboard ? 'd-block' : 'd-none']" href="/dashboard">Dashboard</a>
          <a class="dropdown-item" v-bind:class="[admin ? 'd-block' : 'd-none']" href="/admin">Admin</a>
          <a class="dropdown-item" v-bind:class="[login ? 'd-block' : 'd-none']" href="/login">Login</a>
          <a class="dropdown-item" v-bind:class="[register ? 'd-block' : 'd-none']" href="/register">Register</a>
          <a class="dropdown-item" v-bind:class="[helpdesk ? 'd-block' : 'd-none']" href="/helpdesk">Helpdesk</a>
          <a class="dropdown-item" v-bind:class="[logout ? 'd-block' : 'd-none']" href="/logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>    
</template>

<script>
    export default {
      data(){
        return{
          dashboard: false,
          admin: false,
          login: false,
          register: false,
          helpdesk: false,
          logout: false,
        }
      },
      mounted(){
        if(localStorage.getItem('isLoggedIn') == 1){
          if(localStorage.getItem('role') == 'admin' || localStorage.getItem('role') == 'manager' || localStorage.getItem('role') == 'blogger'){
          this.admin = true;
          this.dashboard = true;
          this.helpdesk = false;
          this.logout = true;
          this.login = false;
          this.register = false;
          }
          else{
          this.admin = false;
          this.dashboard = true;
          this.helpdesk = true;
          this.logout = true;
          this.login = false;
          this.register = false;
          }
        }
        else{
          this.admin = false;
          this.dashboard = false;
          this.helpdesk = false;
          this.logout = false;
          this.login = true;
          this.register = true;          
        }
      }
    }
</script>
