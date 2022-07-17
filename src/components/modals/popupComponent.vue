<template>
    <transition name="fade">
        <div class="vue-modal" v-show="open">
        <transition name="drop-in">
            <div class="ue-modal-inner" v-show="open">
            <div class="vue-modal-content">
            <p>L'événement est crée avec succès
           </p>
            <button type="submit" @click="close">close</button>
            </div>
        </div>
        </transition>
    </div>
    </transition>
</template>

<script>
import { onMounted, onUnmounted } from 'vue'
export default {
  props: {
    open: {
      type: Boolean,
      required: true
    }
  },
  setup (_, { emit }) {
    const close = () => {
      emit('close')
    }

    const handleKeyup = (event) => {
      if (event.keyCode === 27) {
        close()
      }
    }

    onMounted(() => document.addEventListener('keyup', handleKeyup))
    onUnmounted(() => document.removeEventListener('keyup', handleKeyup))
    return { close }
  }
}
</script>

<style lang="scss" scoped>
::before, ::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.vue-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
  overflow-y: auto;
  background-color: rgba(0, 0, 0, 0.4);
  z-index: 200;
}

.vue-modal-inner {
  max-width: 500px;
  margin: 2rem auto;
}

.vue-modal-content {
  display: flex;
  justify-content: space-between;
  position: relative;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.3);
  background-clip: padding-box;
  border-radius: 0.3rem;
  padding: 1rem;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
.drop-in-enter-active,
.drop-in-leave-active {
  transition: all 0.3s ease-out;
}

.drop-in-enter-from,
.drop-in-leave-to {
  opacity: 0;
  transform: translate(0, -50px);
}
</style>
