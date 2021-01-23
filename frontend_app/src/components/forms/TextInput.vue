<template>
  <div class="form-text">
    <div>
      <div class="flex items-center label-wrapper">
        <div>
          <label
            v-if="label"
            class="text-size-13px font-ubuntu-medium text-gray-500"
            >{{ label }}</label
          >
        </div>
        <div>
          <QuestionMark text="test tooltip here" color="white" />
        </div>
      </div>
      <div class="text-input">
        <input
          type="text"
          :id="id"
          :value="value"
          :placeholder="placeholder"
          :required="required"
          v-on:input="updateValue($event.target.value)"
          class="w-full custom-text-input"
        />
      </div>
    </div>
  </div>
</template>

<script>
import QuestionMark from '@/components/custom-icons/QuestionMark'
export default {
  components: {
    QuestionMark
  },
  props: {
    id: {
      type: String
    },
    label: {
      type: String
    },
    placeholder: {
      type: String
    },
    required: {
      type: Boolean,
      default: false
    },
    value: {
      type: String
    }
  },

  methods: {
    updateValue: function (value) {
      this.$emit('input', value)
    }
  }
}
</script>

<style lang="sass" scoped>
.custom-text-input
  border: 1px solid #CCCCCC
  box-sizing: border-box
  box-shadow: 0px 1px 2px rgba(6, 97, 129, 0.25)
  outline: none
  height: 42px
  @apply #{w-full py-2 text-left px-5}
.label-wrapper
  margin-bottom: 6px
</style>