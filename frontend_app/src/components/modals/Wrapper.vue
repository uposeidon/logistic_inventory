<template>
  <div class="custom-modal fixed" v-if="showModalWrapper">
    <div class="custom-modal-body" red="modal-body" :class="width">
      <div class="flex justify-between items-center">
        <h1 class="text-size-27px font-ubuntu-medium text-blue-400">
          {{ title }}
        </h1>
        <i class="icon-x font-bold" @click="closeModal"></i>
      </div>
      <div class="content py-3">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    width: {
      type: String,
      default: 'w-50p'
    },
    title: {
      type: String
    }
  },
  data() {
    return {
      showModalWrapper: false
    }
  },
  mounted() {
    this.$eventBus.$register('open-modal', () => {
      this.showModalWrapper = true
    })
  },
  methods: {
    closeModal() {
      this.showModalWrapper = false
    }
  }
}
</script>

<style lang="sass" scoped>
.custom-modal
  top: 0
  left: 0
  right: 0
  bottom: 0
  width: 100%
  height: 100%
  z-index: 10 !important
  background: #6b72808f
  @apply #{flex items-start justify-center py-24}
.custom-modal-body
  @apply #{bg-white p-5}
</style>