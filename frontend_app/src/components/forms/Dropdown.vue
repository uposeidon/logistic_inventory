<template>
  <div v-click-away="handleClickAway">
    <div class="flex items-center">
      <div>
        <label
          v-if="label"
          class="text-size-13px mb-2 font-ubuntu-medium text-gray-500"
          >{{ label }}</label
        >
      </div>
      <div v-if="hasTooltip">
        <QuestionMark :text="tooltipText" color="white" />
      </div>
    </div>
    <div class="custom-dropdown">
      <button
        class="dd-btn w-full bg-white hover:bg-gray-100 font-ubuntu-medium"
        @click="toggle()"
      >
        {{ currentValue }}
      </button>
      <i class="icon-chevron-down dd-icon"></i>
      <div class="dd-options hidden py-2" :ref="id">
        <ul>
          <li
            class="px-3 py-2 text-size-12px hover:bg-gray-100 font-ubuntu-medium"
            v-for="(item, index) in options"
            @click="select(item)"
            :key="index"
          >
            {{ item }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { directive } from 'vue3-click-away'
import QuestionMark from '@/components/custom-icons/QuestionMark'
export default {
  components: {
    QuestionMark
  },
  directives: {
    ClickAway: directive
  },
  data() {
    return {
      currentValue: '',
      isClicked: false
    }
  },
  props: {
    label: {
      type: String
    },
    value: {
      type: String
    },
    options: {
      type: Array,
      required: true
    },
    id: {
      type: String,
      required: true
    },
    hasTooltip: {
      type: Boolean,
      default: true
    },
    tooltipText: {
      type: String
    }
  },
  mounted() {
    this.currentValue = this.value
  },
  methods: {
    toggle() {
      this.toggleClick()
      this.$refs[this.id].classList.toggle('hidden')
    },
    select(item) {
      this.currentValue = item
      this.toggleClick()
      this.$refs[this.id].classList.toggle('hidden')
      this.$emit('update-value', item)
    },
    handleClickAway() {
      if (this.isClicked) {
        this.$refs[this.id].classList.toggle('hidden')
        this.toggleClick()
      }
    },
    toggleClick() {
      this.isClicked = this.isClicked ? false : true
    }
  }
}
</script>
<style lang="sass" scoped>
.custom-dropdown
  @apply #{w-full relative}
.dd-btn
  border: 1px solid #CCCCCC
  box-sizing: border-box
  box-shadow: 0px 1px 2px rgba(6, 97, 129, 0.25)
  outline: none
  @apply #{w-full py-2 text-left px-5 }
.dd-icon
  top: 13px
  right: 15px
  @apply #{absolute font-bold}
.dd-options
  border: 1px solid red
  margin-top: 5px
  border: 1px solid #CCCCCC
  box-sizing: border-box
  box-shadow: 0px 1px 2px rgba(6, 97, 129, 0.25)
  @apply #{absolute w-full bg-white}
li
  @apply #{cursor-pointer}
</style>