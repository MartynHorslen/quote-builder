<script>
import Navigation from './components/Navigation.vue';
import PageHeader from './components/PageHeader.vue';
import PageFooter from './components/PageFooter.vue';

export default {
  components: {
    'navigation': Navigation,
    'page-header': PageHeader,
    'page-footer': PageFooter
  },

  data() {
    return {
      sidebar: false
    }
  },

  methods: {
    sidebarActive() {
      this.sidebar = !this.sidebar;
    }
  }
}
</script>

<template>
  <div class="wrapper" :class="{sidebarActive: this.sidebar}">
    <navigation @sidebar="sidebarActive"></navigation>
    <page-header></page-header>
    <router-view></router-view>
    <page-footer></page-footer>
  </div>
</template>

<style>
  :root {
    --primary: #64b5f6;
    --primary-hover:#1869AA;
  }
  .wrapper {
    height: 100%;
    width: 100%;
  }
  .sidebarActive {
    margin-left: 50%;
    overflow-x: hidden;
  }
  body {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow-x: hidden;
  }
  #app {
    height: 100%;
  }
</style>