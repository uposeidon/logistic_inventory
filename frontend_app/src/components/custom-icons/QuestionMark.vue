<template>
  <div class="relative">
    <div class="flex items-center justify-center cursor-pointer question-mark">
      <img
        @mouseover="handleClick"
        @mouseleave="handleClick"
        v-if="color === 'white'"
        :src="questionMark"
        style="width: 10px; filter: brightness(0) invert(1)"
      />
      <img
        @mouseover="handleClick"
        @mouseleave="handleClick"
        v-else
        :src="questionMark"
        style="width: 10px"
      />

      <div ref="tooltip" class="question-mark-tooltip hidden">
        <div class="arrow"></div>
        <p>
          {{ text }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import questionMark from '@/assets/images/question-mark.svg'
export default {
  props: ['color', 'text'],
  data() {
    return {
      questionMark
    }
  },
  methods: {
    handleClick() {
      this.$refs['tooltip'].classList.toggle('hidden')
    }
  }
}
</script>

<style lang="sass" scoped>
.question-mark
  width: 15px
  height: 15px
  background: #9a9a9a
  border-radius: 100%
  padding: 4px
  margin-left: 5px
.question-mark-tooltip
  position: absolute
  width: 200px
  top: 23px
  background: #181818
  @apply #{p-5 z-20 text-size-12px font-ubuntu text-white}
.arrow
  width: 0
  height: 0
  border-left: 5px solid transparent
  border-right: 5px solid transparent
  border-bottom: 5px solid black
  position: absolute
  top: -5px
  right: 95px
</style>