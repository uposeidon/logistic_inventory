<template>
  <div class="container bg-white p-5">
    <h1 class="text-blue-400 font-ubuntu text-size-29px">
      {{ 'Product Insights Across Selected Markets' }}
    </h1>
    <table class="w-full my-3">
      <thead>
        <tr>
          <th class="w-30p">
            <div class="flex items-center">
              <span class="font-ubuntu text-size-14px">{{ 'Marketplace' }}</span
              ><i class="icon-briefcase ml-2"></i>
            </div>
          </th>
          <th class="w-10p">
            <div class="flex items-center justify-start">
              <span class="font-ubuntu text-size-14px">{{
                'Market Price'
              }}</span
              ><i class="icon-chevron-down"></i>
            </div>
          </th>
          <th class="w-10p">
            <div class="flex items-center justify-start">
              <span class="font-ubuntu text-size-14px">{{ 'Expenses' }}</span
              ><i class="icon-chevron-down"></i>
            </div>
          </th>
          <th class="w-10p">
            <div class="flex items-center justify-start">
              <span class="font-ubuntu text-size-14px">{{ 'Profit' }}</span
              ><i class="icon-chevron-down"></i>
            </div>
          </th>
          <th class="w-10p">
            <div class="flex items-center justify-start">
              <span class="font-ubuntu text-size-14px"
                >{{ 'Competition ' }} </span
              ><i class="icon-chevron-down"></i>
            </div>
          </th>
          <th class="w-10p">
            <div class="flex items-center justify-start">
              <span class="font-ubuntu text-size-14px">{{ 'Demand' }}</span
              ><i class="icon-chevron-down"></i>
            </div>
          </th>
          <th class="w-20p">
            <div class="flex items-center justify-end">
              <span class="font-ubuntu text-size-14px">{{
                'Recommendation'
              }}</span
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
                  class="bg-blue-400 p-3 mr-3 font-bold text-white btn-expand"
                >
                  <i class="icon-plus" :id="`row-${item.id}`"></i>
                </button>
                <img :src="ebayIcon" class="mr-3" />
                {{ item.marketPlace }}
              </div>
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu text-start">
              {{ item.marketPrice }}
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu text-start">
              {{ item.expenses }}
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu text-start">
              {{ item.profit }}
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu text-start">
              {{ item.competition }}
            </td>
            <td class="bg-gray-100 py-2 font-ubuntu text-start">
              {{ item.demand }}
            </td>
            <td
              class="bg-gray-100 py-2 font-ubuntu"
              :class="[item.isRecommended ? 'bg-green-400' : 'bg-gray-200']"
            >
              <div class="flex flex-col items-end mr-6 font-ubuntu">
                <div class="flex">
                  <div class="pr-2">
                    <span class="bg-blue-400 text-white rounded ml-3"
                      ><i class="font-bold icon-plus"></i
                    ></span>
                  </div>
                  <div>
                    {{ item.isRecommended ? 'Recommended' : 'Not Recommended' }}
                  </div>
                </div>
                <p
                  v-if="!item.isRecommended"
                  class="text-center text-size-11px"
                >
                  {{ 'Demand is low' }}
                </p>
              </div>
            </td>
          </tr>
          <tr v-if="opened.includes(item.id)">
            <td colspan="7">
              <div class="py-3 relative">
                <i
                  class="icon-x font-bold absolute right-0 cursor-pointer top-5"
                  @click="toggle(item.id)"
                ></i>
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
                      <ExpensesBreakdown />
                    </section>
                    <section id="competitive-analysis" class="tab-panel">
                      <CompetitiveAnalysis />
                    </section>
                    <section id="algopix-recommendation" class="tab-panel">
                      <AlgopixRecommendations />
                    </section>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </template>
        <tr>
          <td colspan="7" class="pb-10 pt-6">
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
import ebayIcon from '@/assets/images/ebay.svg'
import ExpensesBreakdown from '@/components/tabs/products-insights/ExpensesBreakdown'
import CompetitiveAnalysis from '@/components/tabs/products-insights/CompetitiveAnalysis'
import AlgopixRecommendations from '@/components/tabs/products-insights/AlgopixRecommendations'

export default {
  components: {
    ExpensesBreakdown,
    CompetitiveAnalysis,
    AlgopixRecommendations
  },
  data() {
    return {
      ebayIcon,
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
</style>