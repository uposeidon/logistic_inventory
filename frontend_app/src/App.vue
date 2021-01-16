<template>
  <div class="app">
     <Header/>
     <Banner/>
  </div>
</template>

<script>

import Header from './components/partials/Header';
import Banner from './components/partials/Banner';
import './assets/css/app.css';

export default {
  name: 'App',
  components: {
    'Header': Header,
    'Banner': Banner
  }
}
</script>
