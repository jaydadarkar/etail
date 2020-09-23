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
        <a class="nav-link" href="/about-us">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact-us">Contact</a>
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
          <a class="dropdown-item" href="/dashboard">Dashboard</a>
          <a class="dropdown-item" href="/login">Login</a>
          <a class="dropdown-item" href="/register">Register</a>
          <a class="dropdown-item" href="/helpdesk">Helpdesk</a>
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>    
</template>

<script>
    export default {
      name: 'Header'
    }
</script>
