<template>
  <div class="container">
    <div class="flex flex-col lg:flex-row justify-between">
      <div class="lg:w-50p flex flex-col">
        <Dropdown
          label="Product Identifier"
          value="B081KEJDE"
          :options="['test 1', 'test 2', 'test 3']"
          @update-value="getProductIdentifier"
          id="product-identifier"
        />
      </div>
      <div class="lg:w-40p flex flex-col px-3">
        <Dropdown
          label="Identifying Type"
          value="ASIN"
          :options="['test 1', 'test 2', 'test 3']"
          @update-value="getProductIdentifier"
          id="product-identifier-type"
        />
      </div>
      <div class="lg:w-10p flex flex-col justify-end">
        <button class="bg-primary search-btn">
          <i class="icon-search"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Dropdown from '@/components/forms/Dropdown'
export default {
  data() {
    return {
      form: {}
    }
  },
  components: {
    Dropdown
  },
  methods: {
    getProductIdentifier(value) {
      this.form.product_identifier = value
    }
  }
}
</script>
<style lang="sass" scoped>
.search-btn
  height: 42px
  @apply #{font-bold text-white}
</style>