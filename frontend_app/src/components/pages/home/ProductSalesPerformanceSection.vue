<template>
  <div class="container bg-white p-5">
    <h1 class="text-primary font-ubuntu text-size-29px">
      {{ 'Last 30 Days Product Sales Performance ' }}
    </h1>
    <div class="flex flex-col my-3">
      <div class="flex w-full border-b-2 border-gray-300 py-3">
        <div class="w-40p"></div>
        <div class="w-30p flex justify-end">
          <div class="flex items-center">
            <span class="font-ubuntu">{{
              'Estimated unit sales per month'
            }}</span
            ><QuestionMark color="white" />
          </div>
        </div>
        <div class="w-30p flex justify-end">
          <div class="flex items-center">
            <span class="font-ubuntu">{{ 'Estimated revenues per month' }}</span
            ><QuestionMark color="white" />
          </div>
        </div>
      </div>
      <div class="flex w-full border-b-2 border-gray-300 py-3">
        <div class="w-40p flex items-center">
          <img :src="amazonIcon" class="mr-3" />{{ 'Amazon US' }}
        </div>
        <div class="w-30p flex justify-end">
          <span class="font-ubuntu">{{ '35' }}</span>
        </div>
        <div class="w-30p flex justify-end">
          <span class="font-ubuntu">{{ '$300' }}</span>
        </div>
      </div>
      <div class="flex w-full border-b-2 border-gray-300 py-3">
        <div class="w-40p flex items-center">
          <img :src="ebayIcon" class="mr-3" />{{ 'eBay US' }}
        </div>
        <div class="w-30p flex justify-end">
          <span class="font-ubuntu text-size-14px text-gray-400">{{
            "Couldn't find listings that produced sales"
          }}</span>
        </div>
        <div class="w-30p flex justify-end">
          <button class="px-3 font-ubuntu bg-primary text-white text-size-12px">
            {{ 'Edit Sales Filter' }}
          </button>
        </div>
      </div>
      <div class="flex w-full border-b-2 border-gray-300 py-3">
        <div class="w-40p flex items-center">
          <img :src="walmartIcon" class="mr-3" />{{ 'Walmart US' }}
        </div>
        <div class="w-60p flex justify-end">
          <span class="font-ubuntu text-size-14px text-blue-300">{{
            'Data unavailable because the market price could not be found'
          }}</span>
        </div>
      </div>
      <div class="flex w-full py-3">
        <div class="w-40p flex items-center">
          {{ 'Total' }}
        </div>
        <div class="w-30p flex justify-end">
          <span class="font-ubuntu text-size-17px">{{ '33' }}</span>
        </div>
        <div class="w-30p flex justify-end">
          <span class="font-ubuntu text-size-17px">{{ '$300' }}</span>
        </div>
      </div>
    </div>
    <div class="bottom-chart mt-5">
      <div class="flex w-full">
        <div class="w-full lg:w-1/2 flex flex-col">
          <span>{{ 'Amazon' }}</span>
          <span class="mb-2">{{ '$300' }}</span>
          <img :src="bottomChart" class="w-70p" />
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-end">
          <div class="how-do-we p-5 w-80p">
            <strong class="font-ubuntu-medium">{{
              'How do we calculate this data?'
            }}</strong>
            <p class="font-ubuntu">
              {{
                "Algopix's Sales Estimator algorithm combines product data, including real-time transactions and open source information, to estimate product sales on eBay and Amazon marketplaces. Find out more about the Algopix Sales Estimator here."
              }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import QuestionMark from '@/components/custom-icons/QuestionMark'
import ebayIcon from '@/assets/images/ebay.svg'
import amazonIcon from '@/assets/images/amazon.svg'
import walmartIcon from '@/assets/images/walmart.svg'
import bottomChart from '@/assets/images/bottom-chart.svg'
export default {
  data() {
    return {
      ebayIcon,
      amazonIcon,
      walmartIcon,
      bottomChart,
      list: [
        {
          id: 1,
          value1: 'Amazon US',
          value2: '35',
          value3: '$300'
        },
        {
          id: 2,
          value1: 'eBay US',
          value2: "Couldn't find listings that produced sales",
          value3: ''
        },
        {
          id: 3,
          value1: 'Walmart US',
          value2: '',
          value3: 'Data unavailable because the market price could not be found'
        }
      ]
    }
  },
  components: {
    QuestionMark
  }
}
</script>

<style lang="sass" scoped>
.how-do-we
  background: #FCF8C8
</style>