import { createApp } from 'vue';
import App from './App.vue'
import '@/assets/sass/app.sass'
import Emitter from 'tiny-emitter'

const app = createApp(App)

const emitter = new Emitter()

app.config.globalProperties.$eventBus = {
  $emit: (eventName, ...args) => {
    emitter.emit(eventName, ...args)
  },
  $register: (eventName, cb) => {
    emitter.off(eventName)
    emitter.on(eventName, cb)
  }
}

app.mount('#app')
