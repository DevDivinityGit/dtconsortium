
import Router from "./admin_router";
import Store from "./storre/admin_index";
// import TestCom from "../components/Test";




// import table from "../components/Test";


// Vue.component("tablecom", table);



// Vue.component("testcom", TestCom);

// import DataTable from 'laravel-vue-datatable';
//
// Vue.use(DataTable);

const vue = new Vue({
    el: '#app',
    router: Router,
    store: Store,
});


