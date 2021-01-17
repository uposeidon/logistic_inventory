<template>
  <div class="app">
     <Header/>
     <Banner/>
     <ProductInfo/>
  </div>
</template>

<script>

import Header from './components/partials/Header';
import Banner from './components/partials/Banner';
import ProductInfo from './components/partials/ProductInfo';
import './assets/css/app.css';

export default {
  name: 'App',
  components: {
    'Header': Header,
    'Banner': Banner,
    'ProductInfo': ProductInfo
  },
  mounted () {
    document.title = "Shaumik G."
  }
}
</script>
