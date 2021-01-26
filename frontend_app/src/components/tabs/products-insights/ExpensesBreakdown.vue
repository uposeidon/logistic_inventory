<template>
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
              <span class="lg:w-1/2 text-size-17px ml-5 font-ubuntu">{{
                'Purchasing Cost'
              }}</span>
              <div class="lg:w-1/2">
                <span class="font-ubuntu text-size-17px">{{ '$0.00' }}</span>
              </div>
            </div>
          </div>
          <div class="flex h-50px mb-3">
            <div
              class="flex items-center w-full"
              style="border-left: 10px solid #aad8e8"
            >
              <span class="lg:w-1/2 text-size-17px ml-5 font-ubuntu">{{
                'Shipping from US'
              }}</span>
              <div class="lg:w-1/2 flex flex-col justify-center">
                <span class="font-ubuntu text-size-17px">{{ 'N/A' }}</span>
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-15px"
                    >{{ 'By USPS' }}
                  </span>
                  <QuestionMark text="test tooltip here" color="white" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex h-50px mb-3">
            <div
              class="flex items-center w-full"
              style="border-left: 10px solid #1a5dac"
            >
              <span class="lg:w-1/2 text-size-17px ml-5 font-ubuntu">{{
                'Marketplace Fees'
              }}</span>
              <div class="lg:w-1/2 flex flex-col justify-center">
                <span class="font-ubuntu text-size-17px">{{ '$1.20' }}</span>
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-15px"
                    >{{ 'Referral Fee' }}
                  </span>
                  <QuestionMark text="test tooltip here" color="white" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex h-50px mb-3">
            <div
              class="flex items-center w-full"
              style="border-left: 10px solid #545454"
            >
              <span class="lg:w-1/2 text-size-17px ml-5 font-ubuntu">{{
                'Paypal'
              }}</span>
              <div class="lg:w-1/2">
                <span class="font-ubuntu text-size-17px">{{ '$0.00' }}</span>
              </div>
            </div>
          </div>
          <div class="flex h-50px mb-3">
            <div
              class="flex items-center w-full"
              style="border-left: 10px solid #0c5070"
            >
              <span class="lg:w-1/2 text-size-17px ml-5 font-ubuntu">{{
                'Taxes'
              }}</span>
              <div class="lg:w-1/2 flex flex-col justify-center">
                <span class="font-ubuntu text-size-17px">{{ '$1.20' }}</span>
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-15px"
                    >{{ 'Estimated Taxes' }}
                  </span>
                  <QuestionMark text="test tooltip here" color="white" />
                </div>
              </div>
            </div>
          </div>
          <div class="flex h-50px mb-1 mt-5" v-if="hasAddedExpenses">
            <div>
              <input
                type="text"
                class="border border-gray-600 px-3 py-2"
                placeholder="Other"
              />
            </div>
            <div>
              <input
                type="text"
                class="border border-gray-600 px-3 py-2 ml-3"
                placeholder="0"
              />
              <button class="bg-gray-700 px-3 py-2 ml-3 text-white">
                {{ 'Add' }}
              </button>
            </div>
          </div>
        </div>
        <div class="mb-2">
          <span
            class="text-blue-400 font-ubuntu flex items-center cursor-pointer"
            @click="addExpenses"
            ><i class="icon-plus mr-1"></i> Add Expenses</span
          >
        </div>
        <hr />
        <div class="flex h-50px">
          <div class="flex items-center w-full">
            <span class="lg:w-1/2 text-size-17px font-ubuntu-medium">{{
              'Total'
            }}</span>
            <div class="lg:w-1/2">
              <span class="font-ubuntu-medium text-size-17px total-expense">{{
                '$1.50'
              }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'
import QuestionMark from '@/components/custom-icons/QuestionMark'
export default {
  components: {
    apexchart: VueApexCharts,
    QuestionMark
  },
  data() {
    return {
      hasAddedExpenses: false,
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
          colors: ['#4A90E2', '#6A8993', '#1A5DAC', '#545454', '#0C5070']
        },
        colors: ['#4A90E2', '#6A8993', '#1A5DAC', '#545454', '#0C5070'],
        plotOptions: {
          pie: {
            startAngle: 0,
            endAngle: 360,
            expandOnClick: true,
            offsetX: 0,
            offsetY: 0,
            customScale: 1,
            dataLabels: {
              offset: 0,
              minAngleToShowLabel: 10
            },
            donut: {
              size: '70%',
              background: 'transparent',
              labels: {
                show: true,
                name: {
                  show: true,
                  fontSize: '30px',
                  fontFamily: 'Ubuntu Medium',
                  fontWeight: 600,
                  color: undefined,
                  offsetY: -10,
                  formatter: function (val) {
                    return val
                  }
                },
                value: {
                  show: true,
                  fontSize: '16px',
                  fontFamily: 'Ubuntu Medium',
                  fontWeight: 400,
                  color: undefined,
                  offsetY: 16,
                  formatter: function (val) {
                    return val
                  }
                },
                total: {
                  show: true,
                  showAlways: false,
                  label: 'Total',
                  fontSize: '22px',
                  fontFamily: 'Ubuntu Medium',
                  fontWeight: 600,
                  color: '#373d3f',
                  formatter: function (w) {
                    return w.globals.seriesTotals.reduce((a, b) => {
                      return a + b
                    }, 0)
                  }
                }
              }
            }
          }
        }
      },
      series: [44, 55, 13, 33, 44]
    }
  },
  methods: {
    addExpenses() {
      this.hasAddedExpenses = true
    }
  }
}
</script>