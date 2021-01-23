<template>
  <div class="container bg-white p-5">
    <div class="flex items-center">
      <h1 class="text-primary font-ubuntu text-size-29px">
        {{ 'Last 30 Days Product Sales Performance ' }}
      </h1>
      <img :src="youtubeIcon" class="ml-3" @click="openModal" />
    </div>
    <div class="flex flex-col my-3">
      <div class="flex w-full border-b-2 border-gray-300 py-3">
        <div class="w-40p"></div>
        <div class="w-30p flex justify-end">
          <div class="flex items-center">
            <span class="font-ubuntu">{{
              'Estimated unit sales per month'
            }}</span
            ><QuestionMark text="test tooltip here" color="white" />
          </div>
        </div>
        <div class="w-30p flex justify-end">
          <div class="flex items-center">
            <span class="font-ubuntu">{{ 'Estimated revenues per month' }}</span
            ><QuestionMark text="test tooltip here" color="white" />
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
            <div class="mb-2">
              <strong class="font-ubuntu-medium">{{
                'How do we calculate this data?'
              }}</strong>
            </div>
            <p class="font-ubuntu text-size-15px">
              {{
                "Algopix's Sales Estimator algorithm combines product data, including real-time transactions and open source information, to estimate product sales on eBay and Amazon marketplaces. Find out more about the Algopix Sales Estimator"
              }}
              <a href="" class="font-ubuntu text-primary text-size-15px">{{
                'here.'
              }}</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL HERE -->
    <div class="custom-modal fixed" ref="modal">
      <div class="custom-modal-body" red="modal-body">
        <div class="flex justify-between items-center">
          <h1 class="text-size-27px font-ubuntu-medium">{{ '' }}</h1>
          <i class="icon-x font-bold" @click="closeModal"></i>
        </div>
        <div class="content py-3">
          <iframe
            width="100%"
            height="450"
            src="https://www.youtube.com/embed/NoZ7q_3yemg"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
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
import youtubeIcon from '@/assets/images/youtube.svg'
export default {
  data() {
    return {
      ebayIcon,
      amazonIcon,
      walmartIcon,
      bottomChart,
      youtubeIcon,
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
  mounted() {},
  components: {
    QuestionMark
  },
  methods: {
    openModal() {
      this.$refs['modal'].style.zIndex = 10
      this.$refs['modal-body'].style.zIndex = 10
    },
    closeModal() {
      this.$refs['modal'].style.zIndex = -1
      this.$refs['modal-body'].style.zIndex = -1
    }
  }
}
</script>

<style lang="sass" scoped>
.how-do-we
  background: #FCF8C8
.custom-modal
  top: 0
  left: 0
  right: 0
  bottom: 0
  width: 100%
  height: 100%
  z-index: -1
  background: #6b72808f
  @apply #{flex items-start justify-center py-24}
.custom-modal-body
  z-index: -1
  @apply #{bg-white w-50p p-5}
</style>