<script>
import { ref } from 'vue';

export default {
  data() {
    return {
      isActive: false
    }
  },

  computed: {
    console: () => console,
  },

  methods: {
    active(){
      this.isActive = ! this.isActive
    } 
  }
}
</script>

<template>
<nav class="navbar navbar-expand-md navbar-light">
  <div class="container-fluid justify-content-start">
    <button class="navbar-toggler hamburger hamburger--spin" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" :class="{'is-active': isActive}" @click="active">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    <a class="navbar-brand ms-3" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-md-auto my-2 my-md-0 mb-md-0 gap-3 me-md-3">
            <li><router-link to="/">Go to Home</router-link></li>
            <li><router-link to="/about">Go to About</router-link></li>
      </ul>
    </div>
  </div>
</nav>
    <router-view></router-view>
</template>