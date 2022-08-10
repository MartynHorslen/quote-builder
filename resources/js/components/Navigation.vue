<script>
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
<nav class="">
  <div class="container-fluid py-md-2 justify-content-start justify-content-md-between d-md-flex flex-md-row">
    <button class="hamburger hamburger--spin d-md-none" type="button" :class="{'is-active': isActive}" @click="$emit('sidebar'), active()">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    <a class="ms-3" href="#">Company Logo</a>
    <div class="flex-grow-0" :class="isActive ? 'fixedSidebar' : 'hideSidebar'">
      <h2 class="menu d-md-none">Menu</h2>
      <ul class="ms-md-auto my-2 my-md-0 mb-md-0 gap-3 me-md-3 d-md-flex list-unstyled ">
            <li><router-link to="/">Go to Home</router-link></li>
            <li><router-link to="/about">Go to About</router-link></li>
            <li>Another link</li>
            <li>Another link</li>
      </ul>
    </div>
  </div>
</nav>
</template>

<style>
  .hideSidebar {
    display: none;
  }
  .fixedSidebar {
    position: fixed;
    left: 0;
    top: 0;
    background-color: #333;
    height: 100%;
    width: 60%;
  }
  .fixedSidebar ul {
    padding: 0;
  }
  .fixedSidebar li {
    border-bottom: 1px solid lightgray;
    padding: 10px 15px;
  }
  .fixedSidebar li:first-child {
    border-top: 1px solid lightgray;
  }
  .fixedSidebar li, li a {
    color: white;
    list-style: none;
    text-decoration: none;
  }
  .fixedSidebar li {
    cursor: pointer;
  }
  .fixedSidebar li:hover, li:hover a {
    color: darkgray;
    background-color: rgb(102, 101, 101);
  }
  .fixedSidebar .menu {
    color: lightgrey;
    text-align: center;
    padding: 10px 0;
  }

  @media (min-width: 768px){
    .hideSidebar {
      display: block;
    }
    .fixedSidebar {
      position: inline-block;
    }
    .fixedSidebar li, li a {
    color: black;
  }
  }
</style>