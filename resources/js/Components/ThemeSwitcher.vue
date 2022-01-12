<template>
  <button :title="theme == 'dark' ? 'Dark Theme' : 'Light Theme'"
    @click="toggleTheme()"
    aria-label="Theme Switcher"
    class="theme p-3 text-white bg-navy dark:bg-lightBlue">
    <MoonIcon class="h-5 w-5" v-if="theme === 'light'" />
    <SunIcon class="h-5 w-5" v-else />
  </button>
</template>

<script>
import { SunIcon, MoonIcon } from '@heroicons/vue/outline'
export default {
  components: {
    SunIcon,
    MoonIcon
  },
  data() {
    return {
      theme: ( localStorage.theme !== undefined ? localStorage.getItem("theme") : 'light' )
    };
  },
  mounted() {
    if ( this.theme == 'dark' ) {
        document.documentElement.classList.add("dark");
    }
  },
  methods: {
    toggleTheme(){}
  }
}
</script>

<style lang="scss">
    .theme{
        position: absolute;
        top: 2rem;
        right: 2rem;
    }
</style>
