<template>
  <div
    class="flex items-center justify-center cursor-pointer"
    style="
      width: 15px;
      height: 15px;
      background: #9a9a9a;
      border-radius: 100%;
      padding: 4px;
      margin-left: 5px;
    "
  >
    <img
      v-if="color === 'white'"
      :src="questionMark"
      style="width: 10px; filter: brightness(0) invert(1)"
    />
    <img v-else :src="questionMark" style="width: 10px" />
  </div>
</template>

<script>
import questionMark from '@/assets/images/question-mark.svg'
export default {
  props: ['color'],
  data() {
    return {
      questionMark
    }
  }
}
</script>

<style>
</style>