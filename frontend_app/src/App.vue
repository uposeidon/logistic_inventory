<!-- Shaumik G. -->
<template>
  <div class="app">
     <Header/>
     <Banner/>
     <ProductInfo/>
     <ProductInsight/>
     <ProductSales/>
  </div>
</template>

<script>

import Header from './components/partials/Header';
import Banner from './components/partials/Banner';
import ProductInfo from './components/partials/ProductInfo';
import ProductInsight from './components/partials/ProductInsight';
import ProductSales from './components/partials/ProductSales';

import './assets/css/app.css';

export default {
  name: 'App',
  components: {
    'Header': Header,
    'Banner': Banner,
    'ProductInfo': ProductInfo,
    'ProductInsight': ProductInsight,
    'ProductSales': ProductSales,
  },
  mounted () {
    document.title = "Tom C."
  }
}
</script>
