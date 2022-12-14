import Home from "../components/admin/Home";


import Login from "../components/layouts/Login";
import Reset from "../components/layouts/Reset";
import ChangePassword from "../components/layouts/ChangePassword";




// COMPONENTS

import Slider from "../components/admin/layouts/Slider";
import Footer from "../components/admin/layouts/Footer";
import Nav from "../components/admin/layouts/Nav";



Vue.component("scom", Slider);
Vue.component("footercom", Footer);
Vue.component("navcom", Nav);






// END COMPONENTS









import TestCom from "../components/Test";


//USER CRUD


import MainContent from "../components/layouts/users/Maincontent";
import CreateUser from "../components/layouts/users/CreateUser";
import EditUser from "../components/layouts/users/Edit";
import UserView from "../components/layouts/users/View";
import VerifyCode from "../components/admin/layouts/VerifyCode";

// END USER CRUD


// PLAN ROUTES

import AllPlans from "../components/layouts/plans/Index";
import CreatePlan from "../components/layouts/plans/Create";
import EditPlan from "../components/layouts/plans/Edit";



// END PLAN ROUTES

//TASK ROUTES

import AllTasks from "../components/layouts/tasks/Index";
import CreateTask from "../components/layouts/tasks/Create";
import AllTask from "../components/layouts/tasks/AllTasks";
import TaskEdit from "../components/layouts/tasks/Edit";


// END TASK ROUTES





// IMAGE PROMOTION
import CreatePromotionImage from "../components/layouts/promotion_images/Create";
import AllPromotionImage from "../components/layouts/promotion_images/Index";
import GuidAll from "../components/layouts/guid/Index";

// DOWNLOAD API
import CreateDownloadApi from "../components/layouts/download_api/Create";
import DownloadApiIndex from "../components/layouts/download_api/Index";
import DownloadApiEdit from "../components/layouts/download_api/Edit";


// VIDEOS
import VideoCreate from "../components/layouts/videos/Create";
import VideoIndex from "../components/layouts/videos/Index";
import VideoEdit from "../components/layouts/videos/Edit";
// ADDRESS
import AddressIndex from "../components/layouts/address/Index";

// WHATSAPP LINKS
import WhatsappIndex from "../components/layouts/whatsapp_links/Index";





// TRANSACTIONS

import TransactionsIndex from "../components/layouts/transactions/Index";
import TransactionWithdrawal from "../components/layouts/transactions/Withdrawal";
import Root from "../components/admin/Root";






// Countries
import CountryIndex from "../components/layouts/countries/Index";
import CountryEdit from "../components/layouts/countries/Edit";












const routes = [
    {path: '', component: Root, name: 'root',

        beforeEnter: (to, from, next) => {

        let box = document.getElementById('ssr-box');
        if(box) {
            box.remove();
            location.href = "/";
        }

            if(localStorage.getItem('token') === null) {
                next({name: 'login'});

            } else next();
        },


    },
    {path: '/', component: Home, name: 'home',
        children: [


            {path: "users", component: MainContent, name: 'users'},
            {path: "users/:id/edit", component: EditUser, name: 'edit.user'},
            {path: "user/view/:id", component: UserView, name: 'user.view'},
            {path: "plans", component: AllPlans, name: 'plans'},
            {path: "plans/:id/edit", component: EditPlan, name: 'edit.plan'},
            {path: "plans/create", component: CreatePlan, name: 'create.plan'},



            // TASKS
            {path: "tasks", component: AllTasks, name: 'tasks'},
            {path: "tasks/create", component: CreateTask, name: 'create.task'},
            {path: "all-tasks", component: AllTask, name: 'tasks.index'},
            {path: "tasks/:id/edit", component: TaskEdit, name: 'tasks.edit'},






            // {path: "create-user", component: CreateUser, name: 'create.user'},




            {path: "guid-apis", component: GuidAll, name: 'guid.index'},



            // PROMOTION IMAGES


            {path: "promotion-images", component: AllPromotionImage, name: 'promotion.images.all'},
            {path: "promotion-images/create", component: CreatePromotionImage, name: 'promotion.images.create'},



            // DOWNLOAD API

            {path: "download-apis-create", component: CreateDownloadApi, name: 'download_api.create'},
            {path: "download-apis-index", component: DownloadApiIndex, name: 'download_api.index'},
            {path: "download-apis/:id/edit", component: DownloadApiEdit, name: 'download_api.edit'},




            // VIDEOS
            {path: "videos-create", component: VideoCreate, name: 'videos.create'},
            {path: "all-videos", component: VideoIndex, name: 'videos.index'},
            {path: "all-videos/:id/edit", component: VideoEdit, name: 'videos.edit'},

            // ADDRESS


            {path: "address", component: AddressIndex, name: 'address.index'},

            // WHATSAPP LINKS

            {path: "whatsapp-link", component: WhatsappIndex, name: 'whatsapp.index'},


            // TRANSACTIONS
            {path: "transactions", component: TransactionsIndex, name: 'transaction.index'},
            {path: "transactions-withdrawal", component: TransactionWithdrawal, name: 'transaction.withdrawal'},





            // COUNTRIES
            {path: "countries", component: CountryIndex, name: 'countries.index'},
            {path: "countries/:id/edit", component: CountryEdit, name: 'countries.edit'},










            // {path: "products", component: AllProducts, name: 'all.products'},
            // {path: "products/create", component: ProductCreate, name: 'product.create'},
            // {path: "products/trashed", component: TrashedProducts, name: 'trashed.products'},
            // {path: "products/:slug/edit", component: ProductEdit, name: 'product.edit'},
            //
            //
            // {path: "categories", component: Categories, name: "categories.all"},
            // {path: "categories/:id/edit", component: CategoryEdit, name: "category.edit"},
            // {path: "categories/create", component: CreateCategory, name: "category.create"},
            //
            //
            //
            //
            //
            // {path: "contact", component: Contact, name: "contact"},
            //
            //
















        ],
        beforeEnter: (to, from, next) => {


            let box = document.getElementById('ssr-box');
            if(box) {
                box.remove();
                location.href = next;
            }




            if(localStorage.getItem('token') === null) {
             next({name: 'login'});

            } else next();
        },


},
    //
    {path: '/reset', component: Reset, name: 'reset'},
    {path: '/verify-code', component: VerifyCode, name: 'verify.code'},
    {path: '/login', component: Login, name: 'login'},
    {path: '/change-password', component: ChangePassword, name: 'change.password'},
    //
    // {path: '*', component: FourOfFour, name: '404'},
    //
    //

    // {path: '/test', component: TestCom, name: 'test.com'},




];

export default routes;



function removeSsr() {

    let els = document.getElementsByClassName('remove-ssr');

       els = Array.from(els);
       els.forEach((item, index) => {
           console.log(item);

           item.remove();
       });


}