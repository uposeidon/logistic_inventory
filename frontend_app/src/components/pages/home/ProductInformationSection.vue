<template>
  <div>
    <div class="flex flex-col">
      <div
        class="product-info-header flex flex-col p-5 justify-center"
        :style="{
          backgroundImage: 'url(' + productInfoHeaderBG + ')'
        }"
      >
        <div class="text-white">
          <h1 class="font-ubuntu-medium text-size-29px">
            {{
              'WOLFGANG PUCK-Organic Soup - Free Range Chicken Noodle, 1 ( 14.5 OZ )'
            }}
          </h1>
        </div>
        <div class="text-white flex items-center h-120px pt-5">
          <div class="w-full lg:w-20p pr-5">
            <div
              class="flex flex-col justify-center border-r-2 border-gray-600 h-100px"
            >
              <div style="height: 40px">
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-14px"
                    >{{ 'Highest Profit Opportunity' }}
                  </span>
                  <QuestionMark />
                </div>
              </div>
              <div style="height: 60px">
                <span class="font-ubuntu text-size-23px">{{
                  'Amazon CA $Nan'
                }}</span>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-20p pr-5">
            <div
              class="flex flex-col justify-center border-r-2 border-gray-600 h-100px"
            >
              <div style="height: 40px">
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-14px"
                    >{{ "Product's Demand Level" }}
                  </span>
                  <QuestionMark />
                </div>
              </div>
              <div style="height: 60px">
                <span class="font-ubuntu text-size-34px">{{ 'N/A' }}</span>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-20p pr-5">
            <div
              class="flex flex-col justify-center border-r-2 border-gray-600 h-100px"
            >
              <div style="height: 40px">
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-14px"
                    >{{ 'Highest Profit Opportunity' }}
                  </span>
                  <QuestionMark />
                </div>
              </div>
              <div style="height: 60px">
                <span class="font-ubuntu text-size-34px">{{ 'N/A' }}</span>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-20p pr-5">
            <div
              class="flex flex-col justify-center border-r-2 border-gray-600 h-100px"
            >
              <div style="height: 40px">
                <div class="flex items-center">
                  <span class="font-ubuntu text-size-14px"
                    >{{ 'Highest Profit Opportunity' }}
                  </span>
                  <QuestionMark />
                </div>
              </div>
              <div style="height: 60px">
                <span class="font-ubuntu text-size-34px">{{ 'N/A' }}</span>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-20p flex flex-col pt-2">
            <div class="bg-white flex flex-row py-2 px-1 mb-2">
              <div>
                <img
                  :src="productNotRecommended"
                  alt="product-not-recommend"
                  class="h-50px w-50px"
                />
              </div>
              <div>
                <span class="text-black">{{ 'Not' }}</span>
                <p class="text-black font-ubuntu-medium">{{ 'Recommended' }}</p>
              </div>
            </div>
            <span class="text-gray-500 text-center">{{
              'Couldn’t Located Market price'
            }}</span>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white font-ubuntu text-size-27px">
        <div class="flex flex-col lg:flex-row">
          <div class="w-full lg:w-70p">
            <h1 class="text-primary font-ubuntu text-size-29px">
              {{ 'Product Information' }}
            </h1>
            <span class="font-ubuntu text-size-17px">{{
              'Product Description'
            }}</span>
            <div class="flex flex-col mt-16">
              <div>
                <div class="flex">
                  <div class="w-full lg:w-2/5">
                    <span class="font-ubuntu-medium text-size-15px">{{
                      'Product Identifiers & Specs'
                    }}</span>
                    <div class="flex flex-col mt-3">
                      <div
                        class="flex flex-row mb-2"
                        v-for="(item, index) in productIdentifiersAndSpecs"
                        :key="index"
                      >
                        <span class="w-20p font-ubuntu-medium text-size-14px"
                          >{{ item.label }}:</span
                        >
                        <span class="w-80p font-ubuntu text-size-14px">{{
                          item.value
                        }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full lg:w-2/5">
                    <span class="font-ubuntu-medium text-size-15px">{{
                      'Product Dimensions'
                    }}</span>
                    <div class="flex flex-col mt-3">
                      <div
                        class="flex flex-row mb-2"
                        v-for="(item, index) in productDimensions"
                        :key="index"
                      >
                        <span class="w-20p font-ubuntu-medium text-size-14px"
                          >{{ item.label }}:</span
                        >
                        <span class="w-80p font-ubuntu text-size-14px pl-2">{{
                          item.value
                        }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full lg:w-2/5">
                    <span class="font-ubuntu-medium text-size-15px">{{
                      'Shipping Dimensions'
                    }}</span>
                  </div>
                </div>
              </div>
              <div class="mt-5">
                <div>
                  <div class="flex items-center">
                    <img :src="chevronDown" alt="chevron-down" />
                    <span class="ml-1 font-ubuntu-medium text-size-15px">{{
                      'View Additional Attributes'
                    }}</span>
                  </div>
                  <div class="flex flex-col lg:flex-row">
                    <div class="w-full lg:w-1/2">
                      <div class="flex flex-col mt-3">
                        <div
                          class="flex flex-row mb-2"
                          v-for="(item, index) in additionalAttributes"
                          :key="index"
                        >
                          <span class="font-ubuntu-medium text-size-14px"
                            >{{ item.label }}:</span
                          >
                          <span class="font-ubuntu text-size-14px pl-2">{{
                            item.value
                          }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                      <div class="flex flex-col mt-3">
                        <div
                          class="flex flex-row mb-2"
                          v-for="(item, index) in additionalAttributes2"
                          :key="index"
                        >
                          <span class="font-ubuntu-medium text-size-14px"
                            >{{ item.label }}:</span
                          >
                          <span class="font-ubuntu text-size-14px pl-2">{{
                            item.value
                          }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full lg:w-30p">
            <div
              class="product-image-wrapper mt-24 p-5 flex items-center justify-center mb-3"
            >
              <img :src="testProduct" alt="test-product" />
            </div>
            <div class="text-center">
              <span class="text-size-15px font-ubuntu">{{
                'Not the item you were looking for ?'
              }}</span>
              <button
                class="mt-3 px-3 py-2 text-size-15px font-ubuntu border-2 border-primary hover:bg-blue-600 hover:text-white"
              >
                {{ 'Find more items matching your search' }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import productInfoHeaderBG from '@/assets/images/product-info-header.png'
import productNotRecommended from '@/assets/images/product-not-recommended.png'
import testProduct from '@/assets/images/test-product.png'
import chevronDown from '@/assets/images/chevron-down.svg'
import QuestionMark from '@/components/custom-icons/QuestionMark'
export default {
  components: {
    QuestionMark
  },
  data() {
    return {
      productInfoHeaderBG,
      productNotRecommended,
      testProduct,
      chevronDown,
      productIdentifiersAndSpecs: [
        {
          label: 'AID:',
          value: 'AID322812001'
        },
        {
          label: 'ASIN',
          value: 'B081PPHJZ'
        },
        {
          label: 'EAN',
          value: 'B02468851482'
        },
        {
          label: 'UPC',
          value: '885609016030'
        },
        {
          label: 'Model',
          value: '375482-01'
        },
        {
          label: 'Brand',
          value: 'Dyson'
        },
        {
          label: 'Color',
          value: 'Fuchsia'
        }
      ],
      productDimensions: [
        {
          label: 'Width',
          value: '7.5 in'
        },
        {
          label: 'Length',
          value: '15.3 in'
        },
        {
          label: 'Height',
          value: '6.7 in'
        },
        {
          label: 'Weight',
          value: '23.36.oz'
        }
      ],
      additionalAttributes: [
        {
          label: 'Adult Product',
          value: 'false'
        },
        {
          label: 'Lang',
          value: 'en-us'
        },
        {
          label: 'Number of Items',
          value: '1'
        },
        {
          label: 'Part Number',
          value: '310731-02'
        }
      ],
      additionalAttributes2: [
        {
          label: 'Processor Count',
          value: '1'
        },
        {
          label: 'Publisher',
          value: 'Dyson'
        },
        {
          label: 'Release Date',
          value: '2019-12-01'
        },
        {
          label: 'Studio',
          value: 'Dyson'
        }
      ]
    }
  }
}
</script>

<style lang="sass" scoped>
.product-info-header
  height: 252px
.product-image-wrapper
  background: #FFFFFF
  border: 1px solid #C4C4C4
  box-sizing: border-box
</style>