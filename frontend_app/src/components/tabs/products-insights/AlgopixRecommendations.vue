<template>
  <div>
    <div>
      <div>
        <span class="font-ubuntu-medium text-green-400">{{
          'Recommended'
        }}</span>

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
            <span class="mb-3 text-size-15px block">{{
              'Products with a'
            }}</span>
            <span class="font-ubuntu-bold text-size-18px text-green-400">{{
              'Medium or High Demand'
            }}</span>
          </div>
        </div>
        <div class="w-full lg:w-30p border border-gray-500">
          <div class="p-5 text-center">
            <span class="mb-3 text-size-15px block">{{
              'Products with a'
            }}</span>
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

    <br />
    <br />
    <br />
    <div>
      <div>
        <span class="font-ubuntu-medium text-red-400">{{
          'Not Recommended'
        }}</span>

        <h2 class="text-size-22px mt-3 font-ubuntu-medium">
          {{ 'Why is this item not recommended?' }}
        </h2>
      </div>
      <div class="flex mt-5 justify-between">
        <div class="w-full lg:w-65p lg:pr-5">
          <div class="flex justify-between">
            <div
              class="w-full lg:w-45p border border-gray-500 text-center py-4"
            >
              <div class="pb-3 px-5">
                <span class="text-size-15px font-ubuntu">{{
                  'Product in'
                }}</span>
                <h2 class="text-size-30px text-red-600 font-ubuntu">
                  {{ 'Low Demand' }}
                </h2>
              </div>
              <hr />
              <div class="p-5 pt-3">
                <p class="text-size-17px font-ubuntu mb-3">
                  {{ 'We recommend purchasing products that are in' }}
                </p>
                <span
                  class="font-ubuntu-medium text-size-16px text-green-400"
                  >{{ 'Medium or High demand' }}</span
                >
              </div>
            </div>
            <div
              class="w-full lg:w-45p border border-gray-500 text-center py-4"
            >
              <div class="pb-3 px-5">
                <span class="text-size-15px font-ubuntu">{{
                  'Product has less than'
                }}</span>
                <div class="flex items-cemter justify-center">
                  <img :src="polygonRedIcon" />
                  <h2 class="text-size-30px text-red-600 font-ubuntu ml-3">
                    {{ '15% Margin' }}
                  </h2>
                </div>
              </div>
              <hr />
              <div class="p-5 pt-3">
                <p class="text-size-17px font-ubuntu mb-3">
                  {{ 'Target Purchase price to achievea 15% profit margin' }}
                </p>
                <span
                  class="font-ubuntu-medium text-size-16px text-green-400"
                  >{{ '$66' }}</span
                >
              </div>
            </div>
          </div>
          <p class="my-4">
            {{
              'We recommend purchashing product with medium or highDemand, with a profit margin of at least 15%'
            }}
          </p>
          <p>
            {{
              'Since this product has low demand and a lower than recemmended profit margin, we believe it is in your best interest to sell other products'
            }}
          </p>
        </div>
        <div class="w-full lg:w-35p lg:pl-5 flex flext justify-end">
          <table>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Market Price' }}</td>
              <td class="text-right">{{ '+$101.99' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Purchasing Cost' }}</td>
              <td class="text-right">{{ '-$1,500.00' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">
                {{ 'Shipping from us to us' }}
              </td>
              <td class="text-right">{{ '-$7.54' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Marketplace Fees' }}</td>
              <td class="text-right">{{ '-$9.18' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Paypal' }}</td>
              <td class="text-right">{{ '-$3.26' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Tax' }}</td>
              <td class="text-right">{{ '-$0.00' }}</td>
            </tr>
            <tr>
              <td class="px-2 py-2"><i class="icon-folder"></i></td>
              <td class="px-2 py-2 text-size-14px">{{ 'Profit' }}</td>
              <td class="text-right">{{ '-$1,500(-1391%)' }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import polygonIcon from '@/assets/images/polygon.svg'
import polygonRedIcon from '@/assets/images/polygon-red.svg'
export default {
  data() {
    return {
      polygonIcon,
      recommendation: 'recommend1',
      polygonRedIcon
    }
  }
}
</script>
<style lang="sass" scoped>
table
  td, #customers th
    border: 1px solid #ddd
    padding: 8px
</style>