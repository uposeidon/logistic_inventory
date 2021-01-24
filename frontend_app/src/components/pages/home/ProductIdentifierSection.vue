<template>
  <div class="container">
    <div class="flex flex-col lg:flex-row justify-between">
      <div class="lg:w-50p flex flex-col">
        <TextInput v-model="form.name" label="Product Identifier" />
      </div>
      <div class="lg:w-45p flex flex-col px-3">
        <Dropdown
          label="Identifying Type"
          value="ASIN"
          :options="['test 1', 'test 2', 'test 3']"
          @update-value="getProductIdentifier"
          id="product-identifier-type"
        />
      </div>
      <div class="lg:w-5p flex flex-col justify-end">
        <button class="bg-primary search-btn">
          <i class="icon-search"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Dropdown from '@/components/forms/Dropdown'
import TextInput from '@/components/forms/TextInput'
export default {
  data() {
    return {
      form: {}
    }
  },
  components: {
    Dropdown,
    TextInput
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