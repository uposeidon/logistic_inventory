<template>
  <div>
    <div class="flex w-full">
      <div class="lg:w-70p lg:pr-5">
        <div class="flex jsutify-between">
          <div class="w-full lg:w-1/2 border-r-2 border-gray-300 pr-8">
            <span class="block font-ubuntu-medium text-size-22px">{{
              '$10.80'
            }}</span>
            <span class="text-size-12px font-ubuntu">{{
              'Market Price (Lowest offering from a reputable seller)'
            }}</span>
          </div>
          <div class="w-full lg:w-1/2 pl-8">
            <span class="block font-ubuntu-medium text-size-22px">{{
              'Just Launched Positive'
            }}</span>
            <span class="text-size-12px font-ubuntu">{{
              'Sellers rating'
            }}</span>
          </div>
        </div>
        <div class="mt-5">
          <span
            class="font-ubuntu-medium text-primary text-size-18px block mb-2"
            >{{ 'Competitive Offerings' }}</span
          >
          <table class="w-full">
            <thead>
              <tr>
                <th class="px-3 py-2 border-b"></th>
                <th class="px-3 py-2 border-b text-size-13px">
                  {{ 'Price' }}
                </th>
                <th class="px-3 py-2 border-b text-size-13px">
                  {{ 'Seller’s Rating' }}
                </th>
                <th class="px-3 py-2 border-b text-size-13px">
                  {{ 'Fulfillment' }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'Buy Box Offering' }}
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'N/A' }}
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'N/A' }}
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'N/A' }}
                </td>
              </tr>
              <tr>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'Lowest Offering' }}
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ '$10.80' }} <i class="icon-edit"></i>
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'Just Launched Positive' }}
                </td>
                <td class="px-3 py-2 border-b text-size-13px">
                  {{ 'Merchant' }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex mt-5">
          <div class="w-full lg:w-1/2 border-r-2 border-gray-300 pr-8">
            <span class="font-ubuntu-medium block text-size-18px">{{
              '10,044'
            }}</span>
            <span class="font-ubuntu block text-size-13px">{{
              'Best Seller Ranking'
            }}</span>
            <span class="font-ubuntu-medium text-size-18px">{{
              'In Download movie'
            }}</span>
          </div>
          <div class="w-full lg:w-1/2 pl-8">
            <span class="font-ubuntu-medium block text-size-18px">{{
              'B07MG88XJ1'
            }}</span>
            <span class="font-ubuntu block text-size-13px">{{
              'Local ASIN'
            }}</span>
          </div>
        </div>
      </div>
      <div class="lg:w-30p lg:pl-5">
        <div>
          <div class="bg-gray-100 rounded-lg">
            <div class="flex flex-col py-4">
              <div class="w-full px-4 py-4">
                <span class="block text-size-22px font-ubuntu-medium">{{
                  'N/A'
                }}</span>
                <span class="text-gray-500 text-size-12px block mb-2">{{
                  'Offerings'
                }}</span>
                <hr />
              </div>
              <div class="w-full px-4 py-4">
                <div class="flex items-center">
                  <img :src="negativeIcon" class="mr-2" />
                  <span class="block text-size-22px font-ubuntu-medium">{{
                    'FBA'
                  }}</span>
                </div>
                <span class="text-gray-500 text-size-12px block mb-2">{{
                  'Not sold via FBA'
                }}</span>
                <hr />
              </div>
              <div class="w-full px-4 py-4">
                <div class="flex items-center">
                  <img :src="positiveIcon" class="mr-2" />
                  <span class="block text-size-22px font-ubuntu-medium">{{
                    'FBA'
                  }}</span>
                </div>
                <span class="text-gray-500 text-size-12px block mb-2">{{
                  'Offered by Amazon'
                }}</span>
                <hr />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import negativeIcon from '@/assets/images/negative.svg'
import positiveIcon from '@/assets/images/positive.svg'
export default {
  data() {
    return {
      negativeIcon,
      positiveIcon
    }
  }
}
</script>

<style lang="sass" scoped>
table
  border-collapse: separate
  border-spacing: 0 5px
  th:first-child
    @apply #{border-b font-ubuntu-medium text-size-13px}
  th:last-child
    @apply #{border-b font-ubuntu-medium text-size-13px}
  td:first-child
    @apply #{border-b font-ubuntu text-size-13px}
  td:last-child
    @apply #{border-b font-ubuntu text-size-13px}
</style>