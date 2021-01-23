<template>
  <div class="container bg-white p-5">
    <h1 class="text-primary font-ubuntu text-size-29px">
      {{ 'Product Insights Across Selected Markets' }}
    </h1>
    <table class="w-full my-3">
      <thead>
        <tr>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Marketplace' }}</span
              ><i class="icon-briefcase ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Market Price' }}</span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Expenses' }}</span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Profit' }}</span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Competition ' }} </span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Demand' }}</span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
          <th>
            <div class="flex items-center">
              <span class="font-ubuntu">{{ 'Recommendation' }}</span
              ><i class="icon-chevron-down ml-2"></i>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <template v-for="(item, index) in list" :key="index">
          <tr>
            <td class="bg-gray-100">
              <div class="flex items-center">
                <button
                  @click="toggle(item.id)"
                  class="bg-primary p-3 mr-3 font-bold text-white btn-expand"
                >
                  <i class="icon-plus" :id="`row-${item.id}`"></i>
                </button>
                <img :src="ebayIcon" class="mr-3" />
                {{ item.marketPlace }}
              </div>
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu">{{ item.marketPrice }}</td>
            <td class="bg-gray-100 py-2 font-ubuntu">{{ item.expenses }}</td>
            <td class="bg-gray-100 py-2 font-ubuntu">{{ item.profit }}</td>
            <td class="bg-gray-100 py-2 font-ubuntu">{{ item.competition }}</td>
            <td class="bg-gray-100 py-2 font-ubuntu">{{ item.demand }}</td>
            <td
              class="bg-gray-100 py-2 font-ubuntu"
              :class="[item.isRecommended ? 'bg-green-400' : '']"
            >
              <div class="flex items-center justify-center font-ubuntu">
                <i class="icon-plus font-bold mr-2"></i>
                {{
                  item.isRecommended ? 'Recommendation' : 'Not Recommendation'
                }}
              </div>
              <p v-if="!item.isRecommended" class="text-center text-size-11px">
                {{ 'Demand is low' }}
              </p>
            </td>
          </tr>
          <tr v-if="opened.includes(item.id)">
            <td colspan="7">
              <div class="py-3">
                <div class="tabset">
                  <input
                    type="radio"
                    name="tabset"
                    id="tab1"
                    aria-controls="expenses-breakdown"
                    checked
                  />
                  <label class="font-ubuntu" for="tab1">{{
                    ' Expenses Breakdown'
                  }}</label>
                  <input
                    type="radio"
                    name="tabset"
                    id="tab2"
                    aria-controls="competitive-analysis"
                  />
                  <label class="font-ubuntu" for="tab2">{{
                    'Competitive Analysis'
                  }}</label>
                  <input
                    type="radio"
                    name="tabset"
                    id="tab3"
                    aria-controls="algopix-recommendation"
                  />
                  <label class="font-ubuntu" for="tab3">{{
                    'Algopix Recommendations'
                  }}</label>

                  <div class="tab-panels">
                    <section id="expenses-breakdown" class="tab-panel">
                      <div class="flex items-center">
                        <div class="w-full lg:w-1/2">
                          <div class="flex items-start">
                            <apexchart
                              width="500"
                              type="donut"
                              :options="chartOptions"
                              :series="series"
                            ></apexchart>
                          </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                          <div class="flex flex-col justify-between">
                            <div class="chart-info">
                              <div class="flex h-50px mb-3">
                                <div
                                  class="flex items-center w-full"
                                  style="border-left: 10px solid #4a90e2"
                                >
                                  <span
                                    class="lg:w-1/2 text-size-17px ml-5 font-ubuntu"
                                    >{{ 'Purchasing Cost' }}</span
                                  >
                                  <div class="lg:w-1/2">
                                    <span class="font-ubuntu text-size-17px">{{
                                      '$0.00'
                                    }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="flex h-50px mb-3">
                                <div
                                  class="flex items-center w-full"
                                  style="border-left: 10px solid #aad8e8"
                                >
                                  <span
                                    class="lg:w-1/2 text-size-17px ml-5 font-ubuntu"
                                    >{{ 'Shipping from US' }}</span
                                  >
                                  <div
                                    class="lg:w-1/2 flex flex-col justify-center"
                                  >
                                    <span class="font-ubuntu text-size-17px">{{
                                      'N/A'
                                    }}</span>
                                    <div class="flex items-center">
                                      <span class="font-ubuntu text-size-15px"
                                        >{{ 'By USPS' }}
                                      </span>
                                      <QuestionMark
                                        text="test tooltip here"
                                        color="white"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="flex h-50px mb-3">
                                <div
                                  class="flex items-center w-full"
                                  style="border-left: 10px solid #1a5dac"
                                >
                                  <span
                                    class="lg:w-1/2 text-size-17px ml-5 font-ubuntu"
                                    >{{ 'Marketplace Fees' }}</span
                                  >
                                  <div
                                    class="lg:w-1/2 flex flex-col justify-center"
                                  >
                                    <span class="font-ubuntu text-size-17px">{{
                                      '$1.20'
                                    }}</span>
                                    <div class="flex items-center">
                                      <span class="font-ubuntu text-size-15px"
                                        >{{ 'Referral Fee' }}
                                      </span>
                                      <QuestionMark
                                        text="test tooltip here"
                                        color="white"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="flex h-50px mb-3">
                                <div
                                  class="flex items-center w-full"
                                  style="border-left: 10px solid #545454"
                                >
                                  <span
                                    class="lg:w-1/2 text-size-17px ml-5 font-ubuntu"
                                    >{{ 'Paypal' }}</span
                                  >
                                  <div class="lg:w-1/2">
                                    <span class="font-ubuntu text-size-17px">{{
                                      '$0.00'
                                    }}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="flex h-50px mb-3">
                                <div
                                  class="flex items-center w-full"
                                  style="border-left: 10px solid #0c5070"
                                >
                                  <span
                                    class="lg:w-1/2 text-size-17px ml-5 font-ubuntu"
                                    >{{ 'Taxes' }}</span
                                  >
                                  <div
                                    class="lg:w-1/2 flex flex-col justify-center"
                                  >
                                    <span class="font-ubuntu text-size-17px">{{
                                      '$1.20'
                                    }}</span>
                                    <div class="flex items-center">
                                      <span class="font-ubuntu text-size-15px"
                                        >{{ 'Estimated Taxes' }}
                                      </span>
                                      <QuestionMark
                                        text="test tooltip here"
                                        color="white"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="my-2">
                              <a
                                href=""
                                class="text-primary font-ubuntu flex items-center"
                                ><i class="icon-plus mr-1"></i> Add Expenses</a
                              >
                            </div>
                            <hr />
                            <div class="flex h-50px">
                              <div class="flex items-center w-full">
                                <span
                                  class="lg:w-1/2 text-size-17px font-ubuntu-medium"
                                  >{{ 'Total' }}</span
                                >
                                <div class="lg:w-1/2">
                                  <span
                                    class="font-ubuntu-medium text-size-17px total-expense"
                                    >{{ '$1.50' }}</span
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="competitive-analysis" class="tab-panel">
                      <div id="pie-2"></div>
                    </section>
                    <section id="algopix-recommendation" class="tab-panel">
                      <div id="pie-3"></div>
                    </section>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </template>
        <tr>
          <td colspan="7" class="border-b border-gray-400 pb-3">
            <span class="font-ubuntu text-size-17px">{{
              'We were unable to find this product on: Walmart US'
            }}</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'
import QuestionMark from '@/components/custom-icons/QuestionMark'
import ebayIcon from '@/assets/images/ebay.svg'
export default {
  components: {
    apexchart: VueApexCharts,
    QuestionMark
  },
  data() {
    return {
      ebayIcon,
      chartOptions: {
        labels: [
          'Purchasing Cost',
          'Shipping from US',
          'Marketplace Fees',
          'Paypal',
          'Taxes'
        ],
        legend: {
          show: false
        },
        fill: {
          colors: ['#4A90E2', '#AAD8E8', '#1A5DAC', '#545454', '#0C5070']
        }
      },
      series: [44, 55, 13, 33, 44],
      opened: [],
      list: [
        {
          id: 1,
          marketPlace: 'eBay FR',
          marketPrice: '$9.98',
          expenses: '$3.18',
          profit: '$6.80',
          competition: 'High',
          demand: 'Low',
          isRecommended: true
        },
        {
          id: 2,
          marketPlace: 'eBay US',
          marketPrice: '$9.98',
          expenses: '$3.18',
          profit: '$6.80',
          competition: 'High',
          demand: 'Low',
          isRecommended: true
        },
        {
          id: 3,
          marketPlace: 'eBay AU',
          marketPrice: '$9.98',
          expenses: '$3.18',
          profit: '$6.80',
          competition: 'High',
          demand: 'Low',
          isRecommended: false
        }
      ]
    }
  },
  mounted() {},
  methods: {
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
  padding: 15px 15px 25px
  border: 1px solid transparent
  border-bottom: 0
  cursor: pointer
  font-weight: 600
  // &::after
  //   content: ""
  //   position: absolute
  //   left: 15px
  //   bottom: 10px
  //   width: 22px
  //   height: 4px
  //   background: #8d8d8d
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
  // th:first-child
  //   @apply #{rounded-l-lg}
  // th:last-child
  //   @apply #{rounded-r-lg}
  // td:first-child
  //   @apply #{rounded-l-lg}
  // td:last-child
  //   @apply #{rounded-r-lg}
.btn-expand
  outline: none !important
.total-expense
  margin-left: 13px
</style>