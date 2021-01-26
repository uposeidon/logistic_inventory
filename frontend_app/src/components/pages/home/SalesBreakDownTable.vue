<template>
  <div>
    <div class="flex items-center justify-between">
      <div class="w-30p h-80px flex items-center">
        <Dropdown
          class="w-full"
          label="Formate"
          value="All"
          :has-tooltip="false"
          :options="['All', 'Test 1', 'Test 2']"
          @update-value="getProductIdentifier"
          id="product-identifier-type"
        />
      </div>
      <div class="w-30p h-80px flex items-center">
        <Dropdown
          class="w-full"
          label="Category"
          value="All"
          :has-tooltip="false"
          :options="['All', 'Test 1', 'Test 2']"
          @update-value="getProductIdentifier"
          id="product-identifier-type"
        />
      </div>
      <div class="w-30p h-80px flex items-end">
        <span>{{ 'Number of items sold: 1' }}</span>
      </div>
    </div>
    <div class="mt-3">
      <table class="w-full">
        <thead>
          <tr>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3"></th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Title' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Seller name' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Postive Feeadback Score' }}
                <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Formate' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Competition ' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'AVG Price' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Quantity Sold' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'GMV' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Date Listed' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
            <th class="border-b border-b-2 border-b-gray-700 px-2 py-3">
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Listing Identfaction' }} <i class="icon-chevron-down"></i>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div style="width: 75px; height: 50px; background: #c4c4c4"></div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Product Name' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Smith Jhon' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ '100% (1.456 total Ratings)' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Intentory' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Hair Dryers ' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ '$799.99' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 1 }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ '$800' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ '21 Dec 2020' }}
              </div>
            </td>
            <td
              class="border-b border-b-2 border-b-gray-700 px-2 py-3 px-2 py-3"
            >
              <div class="flex items-center font-ubuntu text-size-14px">
                {{ 'Baroode' }}
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Dropdown from '@/components/forms/Dropdown'
export default {
  components: {
    Dropdown
  }
}
</script>

<style>
</style>