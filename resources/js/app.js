import './bootstrap';
import DailyRecordPagination from './components/report/Daily-Record-Pagination.vue';
import Calendar from './components/report/Calendar.vue';

import { createApp } from "vue/dist/vue.esm-bundler";
// import {createApp} from 'vue'


// calling laravel routes here.
// use ziggy to change routes using js inside vue component..
// to do this however you need to install ziggy via componser.. 
// then add @routes before ALL OF THE JS
// you can now call route('route-name-in-web.php')
// to change browser location you need to window.location = route('named-route')
// thats it

const app = createApp({})
app.use()
app.component('paginated-table',DailyRecordPagination)
app.component('calendar',Calendar)
app.mount("#app")