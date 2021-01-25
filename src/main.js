import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

import axios from 'axios'

 axios.defaults.baseURL='http://benezid.fr/2021/php/';


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
