require('./bootstrap');
window.Vue = require('vue');
/* -- -- -- -- Third Party Packages -- -- -- -- */
// Vue Resource
import VueResource from "vue-resource";
Vue.use(VueResource);
// Bootstrap
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)
// Moment JS
import moment from "moment";
Vue.use(moment);

Vue.filter('getTime', (value) => {
    return moment(value).startOf('day').fromNow();
})

// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
import Swal from 'sweetalert2'
window.Swal = Swal;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

window.toast = toast;
/* -- -- -- -- Third Party Packages -- -- -- -- */
import Consultant from "./components/Consultant";
import MyProfile from "./components/MyProfile";

Vue.component("app-consultant-component", Consultant);
Vue.component("profile-component", MyProfile);

if (document.getElementById("app") !== null) {

    const app = new Vue({
        el: '#app'
    });

}
