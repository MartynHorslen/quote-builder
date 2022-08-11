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
  <div class="container-fluid py-md-3 justify-content-start justify-content-md-between d-md-flex flex-md-row d-flex align-items-center">
    <button class="hamburger hamburger--spin d-md-none" type="button" :class="{'is-active': isActive}" @click="$emit('sidebar'), active()">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    <router-link to="/" class="text-decoration-none">Company Logo</router-link>
    <div class="links justify-content-md-end" :class="isActive ? 'overlay' : ''">
      <div class="flex-grow-0" :class="isActive ? 'fixedSidebar' : 'hideSidebar'">
          <h2 class="menu d-md-none">Menu</h2>
          <ul class="ms-md-auto my-2 my-md-0 mb-md-0 gap-3 me-md-3 d-md-flex list-unstyled justify-content-md-end">
            <router-link to="/" class="d-md-none"><li>Home</li></router-link>
            <router-link to="/products"><li>Products</li></router-link>
            <router-link to="/quotes"><li>Quotes</li></router-link>
          </ul>
        </div>
      <div class="transparent" @click="$emit('sidebar'), active()"></div>
    </div>
  </div>
</nav>
</template>

<style>
  .hideSidebar {
    display: none;
  }
  .overlay {
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    display:flex;
    flex-direction: row;
  }
  .fixedSidebar {
    flex-basis: 50%;
    background-color: #333;
  }
  .transparent {
    flex-basis: 50%;
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
  .fixedSidebar a {
    color: white;
    list-style: none;
    text-decoration: none;
  }
  .fixedSidebar li {
    cursor: pointer;
  }
  .fixedSidebar a li:hover {
    background-color: rgb(102, 101, 101);
  }
  .fixedSidebar .menu {
    color: lightgrey;
    text-align: center;
    padding: 10px 0;
  }

  .hamburger-inner {
    margin-top: 2px;
  }

  @media (min-width: 768px){
    .overlay {
      position: relative;
      width: auto;
    }
    .transparent {
      display: none;
    }
    #app .sidebarActive {
      margin-left: 0;
    }
    .hideSidebar {
      display: block;
    }
    .fixedSidebar {
      display: inline-block;
      background-color: transparent;
      flex-basis: 100%;
    }
    .fixexSidebar a, a {
      color: #64b5f6 !important;
      text-decoration: none;
    }
    .fixedSidebar ul {
      padding: 0;
    }
    .fixedSidebar li {
      border-bottom: 0;
      padding: 0;
    }
    .fixedSidebar li:first-child {
      border-top: 0;
    }
    .fixedSidebar li {
      cursor: pointer;
    }
    .fixedSidebar li:hover, a li:hover, .logo:hover {
      color: #0a4db1;
      background-color: #fff !important;
    }
    .fixedSidebar .menu {
      color: lightgrey;
      text-align: center;
      padding: 0;
    }
    .links {
      width: auto;
    }
  }
</style>