<template>
  <div class="custom-modal fixed" ref="modal">
    <div class="custom-modal-body" red="modal-body">
      <div class="flex justify-between items-center">
        <h1 class="text-size-27px font-ubuntu-medium">{{ '' }}</h1>
        <i class="icon-x font-bold" @click="closeModal"></i>
      </div>
      <div class="content py-3">
        <iframe
          width="100%"
          height="450"
          src="https://www.youtube.com/embed/NoZ7q_3yemg"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="sass" scoped>
.custom-modal
  top: 0
  left: 0
  right: 0
  bottom: 0
  width: 100%
  height: 100%
  z-index: -1
  background: #6b72808f
  @apply #{flex items-start justify-center py-24}
.custom-modal-body
  z-index: -1
  @apply #{bg-white w-50p p-5}
</style>