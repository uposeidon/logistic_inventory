<template>
  <div>
    <div class="py-5">
      <ProductIdentifierSection />
    </div>
    <div class="container">
      <ProductInformationSection />
      <hr />
      <ProductInsightsSection />
      <hr />
      <ProductSalesPerformanceSection />
    </div>
  </div>
</template>

<script>
import ProductIdentifierSection from '@/components/pages/home/ProductIdentifierSection'
import ProductInformationSection from '@/components/pages/home/ProductInformationSection'
import ProductInsightsSection from '@/components/pages/home/ProductInsightsSection'
import ProductSalesPerformanceSection from '@/components/pages/home/ProductSalesPerformanceSection'

export default {
  components: {
    ProductIdentifierSection,
    ProductInformationSection,
    ProductInsightsSection,
    ProductSalesPerformanceSection
  }
}
</script>

<style>
</style>