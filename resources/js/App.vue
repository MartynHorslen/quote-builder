<script>
import Navigation from './components/Navigation.vue'

export default {
  components: {
    'navigation': Navigation
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
  <div :class="{sidebarActive: this.sidebar}">
    <navigation @sidebar="sidebarActive"></navigation>
    <router-view></router-view>
  </div>
</template>

<style>
  .sidebarActive {
    margin-left: 60%;
    overflow-x: hidden;
  }
  body {
    position: relative;
    width: 100%;
    height: 100vh;
  }
  #app {
    height: 100%;
  }
</style>