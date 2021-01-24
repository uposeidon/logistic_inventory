<template>
  <div>
    <div>
      <span class="font-ubuntu-medium text-green-400">{{ 'Recommended' }}</span>

      <h2 class="text-size-22px mt-3 font-ubuntu">
        {{ 'How does Algopix recommend products:' }}
      </h2>
      <p class="font-ubuntu text-gray-500">
        {{
          'To make sure you have the best chance of success, Algopix recommends:'
        }}
      </p>
    </div>
    <div class="flex mt-5 justify-between">
      <div class="w-full lg:w-30p border border-gray-500">
        <div class="p-5 text-center">
          <span class="mb-3 text-size-15px block">{{ 'Products with a' }}</span>
          <span class="font-ubuntu-bold text-size-18px text-green-400">{{
            'Medium or High Demand'
          }}</span>
        </div>
      </div>
      <div class="w-full lg:w-30p border border-gray-500">
        <div class="p-5 text-center">
          <span class="mb-3 text-size-15px block">{{ 'Products with a' }}</span>
          <div class="text-center flex items-center justify-center mb-3">
            <span
              class="text-size-38px block mr-3 font-ubuntu-medium text-green-400"
              >{{ '15%' }}</span
            >
            <img :src="polygonIcon" alt="" />
          </div>
          <p class="text-size-17px font-ubuntu">
            {{
              'Profit margin according to the purchase price and associated costs.'
            }}
          </p>
        </div>
      </div>
      <div class="w-full lg:w-30p border border-gray-500">
        <div class="p-5 text-center">
          <span class="mb-3 text-size-15px block">{{
            'Highest recommended buying price to reach a 15% profit margin'
          }}</span>
          <div class="text-center flex items-center justify-center mb-3">
            <span
              class="text-size-38px block mr-3 font-ubuntu-medium text-green-400"
              >{{ '$5.34' }}</span
            >
            <img :src="polygonIcon" alt="" />
          </div>
          <p class="text-size-17px font-ubuntu">
            {{
              'If your supplier has that item, this is your negotiation target price'
            }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import polygonIcon from '@/assets/images/polygon.svg'
export default {
  data() {
    return {
      polygonIcon
    }
  }
}
</script>

<style>
</style>