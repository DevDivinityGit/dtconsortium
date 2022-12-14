<template>
    <div>
        <nav-com></nav-com>
        <slider></slider>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <div>



                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>









                <div class="row" v-if="_theData">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ _theData.users }}</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">



                                <h3>{{ _theData.plans }}<sup style="font-size: 20px"></sup></h3>
                                <p>Total Plans</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>




                            <!--<span v-for="(k, v) in _theData.plans_data"> <strong> {{v}}</strong>  has <strong> {{k}} users </strong></span>-->





                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ _theData.tasks }}</h3>
                                <p>All Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ _theData.submitted_tasks }}</h3>
                                <p>Submitted Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>




                <div class="row" v-if="_theData">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ _theData.total_balance }}</h3>
                                <p>Total Balance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ _theData.pending_balance }}<sup style="font-size: 20px"></sup></h3>
                                <p>Pending Transactions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ _theData.promotion_images }}</h3>
                                <p>Promotion Images</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ _theData.transactions_number }}</h3>
                                <p>Number of transactions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 style="display: inline" class="card-title">All Transactions</h3>
                            <!--<router-link :to="{name: 'create.task'}" class="btn btn-info" style="float: right">Add new Task</router-link>-->
                            <span style="clear: both;"></span>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: scroll;">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row justify-content-end">
                                    <div class="col-sm-12">

                                        <span>Show Entries: </span>
                                        <select name="entries" @change="changeLimit($event)" id="" style="width: 10%;">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>



                                        <span> </span>
                                        <select name="entries" @change="findTasks($event)" id=""
                                            style="width: 20%; display: inline; float: right;">
                                            <option value="">All Transactions</option>
                                            <option value="approved">Approved </option>
                                            <option value="rejected">Rejected </option>
                                            <option value="inprogress">In progress </option>
                                            <!--<option value="not taken">Not Taken </option>-->

                                        </select>




                                        <span> </span>
                                        <!--<select name="entries" @change="findProduct($event)" id=""  style="width: 20%; display: inline; float: right;">-->
                                        <!--<option value="">All </option>-->
                                        <!--<option value="1">Withdrawal</option>-->

                                        <!--</select>-->













                                        <!--<div style="display: inline; float: right;">-->
                                        <!--<span>Search: </span>-->
                                        <!--<input type="text" @keyup="findProduct($event)">-->
                                        <!--</div>-->
                                        <span style="clear: both;"></span>




                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">



                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 100px;">
                                                        user Name
                                                    </th>






                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 100px;">
                                                        #transaction id
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Amount
                                                    </th>

                                                    <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                                                    <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                                                    <!--style="width: 100px;">-->
                                                    <!--price-->
                                                    <!--</th>-->





                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 100px;">
                                                        image
                                                    </th>



                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 20px;">
                                                        status
                                                    </th>











                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 200px;">
                                                        Time
                                                    </th>










                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 100px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr role="row" class="even" v-for="product in theLaravelData.data"
                                                    :key="product.id">
                                                    <!--<td class="sorting_1">{{product.name | shortName}}</td>-->

                                                    <span style="display: none;">

                                                        {{ token = false }}

                                                    </span>



                                                    <td>
                                                        {{ product.user.name }}
                                                    </td>

                                                    <td>
                                                        {{ product.transaction_id }}
                                                    </td>


                                                    <td>
                                                        {{ product.amount }}
                                                    </td>


                                                    <td>
                                                        <img @click="hitImg()" class="the-img" :src="product.image"
                                                            alt="" style="cursor: pointer; width: 50px; height: 30px;">
                                                    </td>


                                                    <td>
                                                        {{ product.status }}
                                                    </td>



                                                    <td>
                                                        {{ product.time }}
                                                    </td>


















                                                    <!--<router-link :to="{name: 'product.edit', params: {slug: product.slug}}"  style="font-size: 65%;" clas---s="btn btn-sm btn-warning">Edit</router-link>-->

                                                    <button v-if="product.status === 'inprogress'"
                                                        @click="hitAcceptance(product.id, theLaravelData.meta.current_page, product.user_id)"
                                                        class="btn btn-sm btn-success"
                                                        style="font-size: 65%;">Approve</button>
                                                    <button v-if="product.status === 'inprogress'"
                                                        @click="hitRejection(product.id, theLaravelData.meta.current_page)"
                                                        class="btn btn-sm btn-danger"
                                                        style="font-size: 65%;">Rejection</button>
                                                    <!--&lt;!&ndash;<button  v-if="product.status === 'Accepted'" @click="hitRestore(product.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>&ndash;&gt;-->
                                                    <!--<button  v-if="product.status === 'Rejected'" @click="hitRestore(product.id, product.user.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>-->



                                                </tr>


                                                <tr v-if="token">
                                                    <td>
                                                        No record found
                                                    </td>



                                                </tr>






                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <!--<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">-->
                                        <!--Showing 1 to 10 of 57 entries-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <div style="float: right;">
                                                <pagination :data="laravelData" @pagination-change-page="getResults">
                                                </pagination>

                                            </div>
                                            <span style="clear: both;"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>




























































                <router-view :key="$router.path"></router-view>
            </div>
            <!-- /.content -->
        </div>

        <footer-com></footer-com>



    </div>
</template>

<script>

import Footer from "./layouts/Footer";
import Nav from "./layouts/Nav";
import Slider from "./layouts/Slider";
import TW from "./TW";



export default {
    data() {

        return {
            token: true,
            users: [],
            categories: [
                { name: 'youtube', id: 1 },
                { name: 'facebook', id: 2 },
                { name: 'tiktok', id: 3 },
            ],


            laravelData: {},
            limit: 10,
            finder: '',
            tasksStatus: '',





            theData: null,

        };

    },
    computed: {
        _theData() {

            return this.theData;



        },
        theLaravelData() {

            return this.laravelData;
        },



        theLaravelData() {

            return this.laravelData;
        },




        _categories() {
            return this.categories;
        },




        _users() {
            return this.users;
        },


    },
    watch: {
        limit(newVal, oldVal) {

            this.getResults();





        },
    },







    components: {
        footerCom: Footer,
        navCom: Nav,
        slider: Slider,
        comTw: TW,

        theLaravelData() {

            return this.laravelData;
        },



        theLaravelData() {

            return this.laravelData;
        },




        _categories() {
            return this.categories;
        },




        _users() {
            return this.users;
        }



    },
    created() {


        axios({
            method: 'get',
            url: '/api/root',


        }).
            then(res => {
                this.theData = res.data;
                this.$store.state._theLaravelData = res.data;

                console.log(res.data);


            });






















    },




    methods: {



        hitImg() {
            $('.the-img').addClass('img-enlargable').click(function () {
                var src = $(this).attr('src');
                $('<div class="theD">').css({
                    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                    backgroundSize: 'contain',
                    width: '100%', height: '100%',
                    position: 'fixed',
                    zIndex: '99',
                    top: '0', left: '0',
                    cursor: 'zoom-out'
                }).click(function () {


                    $(this).remove();

                    $(".theD").remove();








                }).appendTo('body');
            });








        },









        findTasks(ev) {



            this.tasksStatus = ev.target.value;
            this.getResults();
        },












        findProduct(ev) {



            this.finder = ev.target.value;
            this.getResults();
        },




        deleteUser(id) {
            axios({
                method: 'delete',
                url: '/api/plans/' + id,

            }).
                then(res => {
                    if (res.data !== 0) {
                        this.users = res.data;
                    }






                });
        },
        hitAcceptance(id, page, userId) {

            let uid = userId ? userId : '';

            axios({
                method: 'get',
                url: '/api/transactions-approve/' + id + "?user_id=" + uid,


            }).
                then(res => {













                    this.getResults(page);


                    if (res.data !== 0) {
                        this.users = res.data;
                    }






                });


        },


        hitRestore(id, userId) {





            axios({
                method: 'get',
                url: '/api/tasks/restore/' + id + '?user_id=' + userId,

            }).
                then(res => {




                    this.getResults();



                    if (res.data !== 0) {
                        this.users = res.data;
                    }






                });


        },






















        hitRejection(id, page) {



            axios({
                method: 'get',
                url: '/api/transactions-reject/' + id,


            }).
                then(res => {




                    this.getResults(page);








                });


        },



        getResults(page = 1) {
            axios({
                method: 'get',
                url: APIURL + '/api/root-transactions?page=' + page + "&limit=" + this.limit + "&purpose_id=" + this.finder + "&tasks_status=" + this.tasksStatus,
                headers: {
                    // 'authorization': "Bearer "+localStorage.getItem('token'),
                }
            })
                .then(response => {
                    // console.clear();
                    console.log(response.data);



                    this.laravelData = response.data;
                });
        },



        changeLimit(ev) {


            this.limit = ev.target.value;

        },












    },

    mounted() {



        this.getResults();

    },


























}

</script>



