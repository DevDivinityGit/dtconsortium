<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Withdrawal Transactions </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Transactions </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>










        <div class="card">
            <div class="card-header">
                <h3 style="display: inline" class="card-title">Data Table With Full Features</h3>
                <router-link :to="{name: 'create.task'}" class="btn btn-info" style="float: right">Add new Task</router-link>
                <span style="clear: both;"></span>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <div class="row justify-content-end"><div class="col-sm-12">

                        <span>Show Entries: </span>
                        <select name="entries" @change="changeLimit($event)" id=""  style="width: 10%;">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>



                        <span> </span>
                        <select name="entries" @change="findTasks($event)" id=""  style="width: 20%; display: inline; float: right;">
                            <option value="">All Transactions</option>
                            <option value="approved">Approved </option>
                            <option value="rejected">Rejected </option>
                            <option value="inprogress">In progress </option>
                            <!--<option value="not taken">Not Taken </option>-->

                        </select>




                        <span> </span>
                        <!--<select name="entries" @change="findProduct($event)" id=""  style="width: 20%; display: inline; float: right;">-->
                        <!--<option value="">All categories</option>-->
                        <!--<option v-for="category in _categories" :value="category.id"  :key="category.id">{{category.name}}</option>-->

                        <!--</select>-->













                        <!--<div style="display: inline; float: right;">-->
                        <!--<span>Search: </span>-->
                        <!--<input type="text" @keyup="findProduct($event)">-->
                        <!--</div>-->
                        <span style="clear: both;"></span>




                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">



                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">
                                    user Name
                                </th>






                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">
                                    USDT Address
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100px;">
                                    Amount
                                </th>

                                <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                                <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                                <!--style="width: 100px;">-->
                                <!--price-->
                                <!--</th>-->





                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 100px;">
                                    image
                                </th>



                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 20px;">
                                    status
                                </th>









                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 200px;">
                                    Time
                                </th>











                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 150px;">Actions</th></tr>
                            </thead>
                            <tbody>

                            <tr role="row" class="even" v-for="product in theLaravelData.data" :key="product.id">
                                <!--<td class="sorting_1">{{product.name | shortName}}</td>-->

                                <td>
                                    {{product.user.name}}
                                </td>

                                <td>
                                    {{product.usdt_address}}
                                </td>


                                <td>
                                    {{product.amount}}
                                </td>


                                <td>
                                    <img @click="hitImg()" class="the-img" :src="product.image" alt="" style="cursor: pointer; width: 50px; height: 30px;">
                                </td>


                                <td>
                                    {{product.status}}
                                </td>



                                <td>
                                    {{product.time}}
                                </td>


















                                <!--<router-link :to="{name: 'product.edit', params: {slug: product.slug}}"  style="font-size: 65%;" clas---s="btn btn-sm btn-warning">Edit</router-link>-->

                                <button    v-if="product.status === 'inprogress'"  @click="hitAcceptance(product.id, theLaravelData.meta.current_page, product.user_id)"  class="btn btn-sm btn-success" style="font-size: 65%;" >Approve</button>
                                <button     v-if="product.status === 'inprogress'"  @click="hitRejection(product.id, theLaravelData.meta.current_page)" class="btn btn-sm btn-danger" style="font-size: 65%;" >Rejection</button>
                                <!--&lt;!&ndash;<button  v-if="product.status === 'Accepted'" @click="hitRestore(product.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>&ndash;&gt;-->
                                <!--<button  v-if="product.status === 'Rejected'" @click="hitRestore(product.id, product.user.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>-->



                            </tr>






                            <tr role="row"   v-if="theLaravelData.data.length === 0" class="even">

                                <td  >
                                    <strong>No records found</strong>
                                </td>

                            </tr>











                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div></div>
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
</template>


<script>
    export default {
        data() {
            return {
                users: [],
                categories: [
                    {name: 'youtube', id: 1},
                    {name: 'facebook', id: 2},
                    {name: 'tiktok', id: 3},
                ],


                laravelData: {},
                limit: 10,
                finder: '',
                tasksStatus: '',






            };
        },


        watch: {
            limit(newVal, oldVal) {

                this.findProduct();





            },
        },


        computed: {
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

        created() {













            // axios({
            //     method: 'get',
            //     url: '/api/tasks',
            //
            // }).
            // then(res => {
            //
            //
            //     this.users = res.data;
            //
            //
            // });



        },

        methods: {


            findProduct(page = 1) {



                this.finder = 1;
                this.getResults(page);
            },






            hitImg() {
                $('.the-img').addClass('img-enlargable').click(function(){
                    var src = $(this).attr('src');
                    $('<div class="theD">').css({
                        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
                        backgroundSize: 'contain',
                        width:'100%', height:'100%',
                        position:'fixed',
                        zIndex:'99',
                        top:'0', left:'0',
                        cursor: 'zoom-out'
                    }).click(function(){


                        $(this).remove();

                        $(".theD").remove();








                    }).appendTo('body');
                });








            },









            findTasks(ev) {



                this.tasksStatus = ev.target.value;
                this.getResults();
            },










            deleteUser(id) {
                axios({
                    method: 'delete',
                    url: '/api/plans/'+id,

                }).
                then(res => {
                    if(res.data !== 0) {
                        this.users = res.data;
                    }






                });
            },








            hitAcceptance(id, page, userId) {

                let uid = userId ? userId : '';

                axios({
                    method: 'get',
                    url: '/api/transactions-approve-withdrawal/'+id+"?user_id="+uid,


                }).
                then(res => {














                    this.getResults(page);


                    if(res.data !== 0) {
                        this.users = res.data;
                    }






                });


            },














            hitRestore(id, userId) {





                axios({
                    method: 'get',
                    url: '/api/tasks/restore/'+id+'?user_id='+userId,

                }).
                then(res => {




                    this.getResults();



                    if(res.data !== 0) {
                        this.users = res.data;
                    }






                });


            },






















            hitRejection(id, page) {



                axios({
                    method: 'get',
                    url: '/api/transactions-reject/'+id,


                }).
                then(res => {




                    this.getResults(page);








                });


            },



            getResults(page = 1) {
                axios({
                    method: 'get',
                    url: APIURL+'/api/root-transactions-withdrawal?page=' + page+"&limit="+this.limit+"&category_id="+this.finder+"&tasks_status="+this.tasksStatus,
                    headers: {
                        'authorization': "Bearer "+localStorage.getItem('token'),
                    }
                })
                    .then(response => {
                        console.clear();
                        console.log(response.data);



                        this.laravelData = response.data;
                    });
            },



            changeLimit(ev) {
                this.limit = ev.target.value;

            },












        },

        mounted() {
            this.findProduct();

        },



















        // data() {
        //     return {
        //         laravelData: {},
        //         limit: 10,
        //         finder: '',
        //
        //     }
        // },
        // computed: {
        //     theLaravelData() {
        //
        //         return this.laravelData;
        //     },
        //
        //
        //
        // },
        // watch: {
        //     limit(newVal, oldVal) {
        //
        //         this.getResults();
        //
        //
        //
        //
        //
        //     },
        // },
        // mounted() {
        //     this.getResults();
        //
        //
        //
        // },
        // methods: {
        //     trashProduct(slug) {
        //         axios({
        //             method: 'delete',
        //             url: APIURL+'/api/products/'+slug,
        //             headers: {
        //                 'authorization': "Bearer "+localStorage.getItem('token'),
        //             }
        //         })
        //             .then(res => {
        //                 if(res.data === 1) {
        //                     this.getResults();
        //
        //                 }
        //             });
        //     },
        //
        //
        //
        //
        //     getResults(page = 1) {
        //         axios({
        //             method: 'get',
        //             url: APIURL+'/api/products?page=' + page+"&limit="+this.limit+"&search="+this.finder,
        //             headers: {
        //                 'authorization': "Bearer "+localStorage.getItem('token'),
        //             }
        //         })
        //             .then(response => {
        //                 this.laravelData = response.data;
        //             });
        //     },
        //     changeLimit(ev) {
        //         this.limit = ev.target.value;
        //
        //     },
        //     findProduct(ev) {
        //         this.finder = ev.target.value;
        //         this.getResults();
        //     },
        // },
        // filters: {
        //     shortName(val) {
        //         return val.substring(0, 10);
        //     }
        // },
        //



    }
</script>







