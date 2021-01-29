<template>
  <div class="container bg-white p-5">
    <div class="flex items-center">
      <h1 class="text-blue-400 font-ubuntu text-size-29px">
        {{ 'Last 30 Days Product Sales Performance ' }}
      </h1>
      <img :src="youtubeIcon" class="ml-3" @click="openYoutubeModal" />
    </div>
    <div>
      <table class="w-full my-3">
        <thead>
          <tr>
            <th class="w-50p"></th>
            <th class="w-20pp">
              <div class="flex items-center justify-end">
                <span class="font-ubuntu text-size-14px">{{
                  'Estimated unit sales per month'
                }}</span
                ><QuestionMark color="white" text="test" />
              </div>
            </th>
            <th class="w-20p">
              <div class="flex items-center justify-end w-full">
                <span class="font-ubuntu text-size-14px">{{
                  'Estimated revenues per month'
                }}</span
                ><QuestionMark color="white" text="test" />
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <template v-for="(item, index) in list" :key="index">
            <tr class="cursor-pointer">
              <td class="border-b border-b-gray-400 py-2 w-40p">
                <div class="flex justify-between">
                  <div class="flex w-50p">
                    <img :src="ebayIcon" class="mr-3" />
                    <span class="font-ubuntu font-bold">{{ item.value1 }}</span>
                  </div>
                  <div class="w-50p">
                    <div class="w-full bg-blue-400">
                      <div class="w-1/2 bg-blue-400">&nbsp;</div>
                    </div>
                  </div>
                </div>
              </td>
              <td
                class="border-b border-b-gray-400 py-2 font-ubuntu w-30p text-right text-size-12px"
              >
                <span
                  v-if="!index"
                  style="padding: 1px 2px"
                  @click="toggle(item.id)"
                  class="bg-blue-400 text-white rounded"
                  ><i
                    class="font-bold"
                    :class="[
                      opened.includes(item.id) ? 'icon-minus' : 'icon-plus'
                    ]"
                  ></i
                ></span>
                {{ item.value2 }}
              </td>
              <td
                class="border-b border-b-gray-400 py-2 font-ubuntu w-30p text-right text-size-12px"
              >
                <span
                  v-if="!index"
                  style="padding: 1px 2px"
                  @click="toggle(item.id)"
                  class="bg-blue-400 text-white rounded"
                  ><i
                    class="font-bold"
                    :class="[
                      opened.includes(item.id) ? 'icon-minus' : 'icon-plus'
                    ]"
                  ></i
                ></span>
                {{ item.value3 }}
              </td>
            </tr>
            <tr v-if="opened.includes(item.id)">
              <td colspan="3">
                <div class="border border-gray-600 p-3">
                  <div class="flex items-center cursor-pointer">
                    <img
                      :src="chevronDown"
                      alt="chevron-down"
                      :style="{
                        transform: !showAdvanceFilter
                          ? 'rotate(270deg)'
                          : 'rotate(361deg)'
                      }"
                    />
                    <span
                      @click="toggleAdvanceFilter"
                      class="text-gray-600 font-ubuntu-medium ml-1"
                      >{{ 'Advance Filters' }}</span
                    >
                    <QuestionMark color="white" text="Lorem ipsum" />
                  </div>
                  <p class="px-3 pt-2 font-ubuntu">
                    {{
                      'Listings included in the  product sales performance were indentified using:'
                    }}
                  </p>
                  <div class="px-3 py-4 flex" v-if="showAdvanceFilter">
                    <div
                      class="mr-5 font-ubuntu text-size-16px flex items-center"
                    >
                      <input type="checkbox" class="mr-2" />
                      {{ 'Product Barcodes' }}
                    </div>
                    <div
                      class="mr-5 font-ubuntu text-size-16px flex items-center"
                    >
                      <input type="checkbox" class="mr-2" />
                      {{ 'Keywords filtered by Algopix Algorithm' }}
                    </div>
                    <div
                      class="mr-5 font-ubuntu text-size-16px flex items-center"
                    >
                      <input type="checkbox" class="mr-2" />
                      {{ 'All Keywords' }}
                    </div>
                    <div
                      class="mr-5 font-ubuntu text-size-16px flex items-center"
                    >
                      <button
                        class="px-5 py-2 bg-blue-400 text-white font-ubuntu"
                      >
                        {{ 'APPLY' }}
                      </button>
                    </div>
                  </div>
                </div>
                <div class="flex justify-between py-4 font-ubuntu">
                  <div class="w-30p border border-gray-200 p-3">
                    <span class="text-gray-400">{{ 'Number of Sellers' }}</span>
                    <h2 class="text-size-27px">{{ '1' }}</h2>
                  </div>
                  <div class="w-30p border border-gray-200 p-3">
                    <span class="text-gray-400">{{ 'Price Range' }}</span>
                    <h2 class="text-size-27px">{{ '$534.99' }}</h2>
                  </div>
                  <div class="w-30p border border-gray-200 p-3">
                    <span class="text-gray-400">{{ 'Average Price' }}</span>
                    <h2 class="text-size-27px">{{ '$534.99' }}</h2>
                  </div>
                </div>
                <div class="w-full text-right px-3">
                  <span
                    @click="openSalesBreakDownModal"
                    class="text-blue-400 cursor-pointer"
                    >{{ 'View Sales Breakdown' }}</span
                  >
                </div>
              </td>
            </tr>
          </template>
          <tr class="cursor-pointer">
            <td class="w-50p pt-5 font-ubuntu-medium text-size-22px text-right">
              TOTAL
            </td>
            <td class="w-20p pt-5 font-ubuntu-medium text-size-22px text-right">
              {{ '5 Units or less' }}
            </td>
            <td class="w-20p pt-5 font-ubuntu-medium text-size-22px text-right">
              {{ '$300' }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <ModalWrapper
      :title="salesBreakDownModal ? 'Sales Breakdown' : ''"
      :width="salesBreakDownModal ? 'w-80p' : 'w-40p'"
    >
      <SalesBreakDownTable v-if="salesBreakDownModal" />
      <iframe
        v-if="youtubeModal"
        width="100%"
        height="315"
        src="https://www.youtube.com/embed/NoZ7q_3yemg"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </ModalWrapper>
  </div>
</template>
<script>
import QuestionMark from '@/components/custom-icons/QuestionMark'
import ebayIcon from '@/assets/images/ebay.svg'
import amazonIcon from '@/assets/images/amazon.svg'
import walmartIcon from '@/assets/images/walmart.svg'
import bottomChart from '@/assets/images/bottom-chart.svg'
import youtubeIcon from '@/assets/images/youtube.svg'
import ModalWrapper from '@/components/modals/Wrapper'
import chevronDown from '@/assets/images/chevron-down.svg'
import SalesBreakDownTable from '@/components/pages/home/SalesBreakDownTable'
export default {
  data() {
    return {
      ebayIcon,
      amazonIcon,
      walmartIcon,
      bottomChart,
      youtubeIcon,
      chevronDown,
      list: [
        {
          id: 1,
          value1: 'eBay US',
          value2: '5 Units or less',
          value3: 'Less than $500'
        },
        {
          id: 2,
          value1: 'Amazon US',
          value2: "Couldn't find listings that produced sales",
          value3: ''
        },
        {
          id: 3,
          value1: 'Walmart US	',
          value2: '',
          value3: 'Data unavailable because the market price could not be found'
        }
      ],
      opened: [],
      showAdvanceFilter: false,
      salesBreakDownModal: false,
      youtubeModal: false
    }
  },
  mounted() {},
  components: {
    QuestionMark,
    ModalWrapper,
    SalesBreakDownTable
  },
  methods: {
    openSalesBreakDownModal() {
      this.youtubeModal = false
      this.salesBreakDownModal = true
      this.$eventBus.$emit('open-modal')
    },
    openYoutubeModal() {
      this.salesBreakDownModal = false
      this.youtubeModal = true
      this.$eventBus.$emit('open-modal')
    },
    toggleAdvanceFilter() {
      this.showAdvanceFilter = this.showAdvanceFilter ? false : true
    },
    toggle(id) {
      let rowIcon = document.getElementById(`row-${id}`)
      const index = this.opened.indexOf(id)
      if (index > -1) {
        this.opened.splice(index, 1)
        if (rowIcon.classList.contains('icon-minus')) {
          rowIcon.classList.remove('icon-minus')
          rowIcon.classList.add('icon-plus')
        }
      } else {
        if (rowIcon.classList.contains('icon-plus')) {
          rowIcon.classList.remove('icon-plus')
          rowIcon.classList.add('icon-minus')
        }
        this.opened.push(id)
      }
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

.tabset > input[type="radio"]
  position: absolute
  left: -200vw
.tabset .tab-panel
  display: none
.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6)
  display: block
.tabset > label
  position: relative
  display: inline-block
  padding: 10px 20px
  border: 1px solid transparent
  border-bottom: 0
  cursor: pointer
  font-weight: 600
  &:hover,
  .tabset > input:focus + label
    color: #06c
  &:hover::after,
  .tabset > input:focus + label::after,
  .tabset > input:checked + label::after
    background: #06c
.tabset > input:checked + label
  border-color: #ccc
  border-bottom: 1px solid #fff
  margin-bottom: -1px
  border-top: 5px solid #4A90E2
.tab-panel
  padding: 30px 0
  border-top: 1px solid #ccc
*,*:before,*:after
  box-sizing: border-box
table
  border-collapse: separate
  border-spacing: 0 1em
.btn-expand
  outline: none !important
.total-expense
  margin-left: 13px

.details,
.show,
.hide:target
  display: none

.hide:target + .show,
.hide:target ~ .details
  display: block
</style>