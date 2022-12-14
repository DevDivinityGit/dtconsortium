<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark" style="margin-left: 30px;">Add Country </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Countries </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>




        <div class="container" >
            <div class="row">
                <div class="ml-2 col-sm-6">
                    <div id="msg"></div>
                    <form method="post" id="image-form">
                        <input @change="getImage($event)" type="file" name="img[]" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ml-2 col-sm-6">
                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                </div>





                <div class="ml-2 col-sm-4" style="opacity: 0;">
                    <label for="num">Country Code</label>
                    <input  type="number" class="form-control">
                </div>

                <div class="ml-2 col-sm-4">
                    <label for="name">Country Name</label>
                    <input type="text" id="name" v-model="form.name" class="form-control">
                </div>



                <div class="ml-2 col-sm-4">
                    <label for="code">Country Code</label>
                    <input  id="code" v-model="form.num" type="number" class="form-control">
                </div>



                <div class="ml-2 col-sm-6">
                    <button @click="hitSubmit()" class="btn btn-primary">Add Country</button>
                </div>







            </div>
        </div>

        <br>
        <br>

        <h3 style="margin-left: 30px;">All Added Countries</h3>
        <hr>








        <div class="card">
            <div class="card-header">
                <h3 style="display: inline" class="card-title">Data Table With Full Features</h3>
                <!--<router-link :to="{name: 'create.user'}" class="btn btn-info" style="float: right">Add new User</router-link>-->
                <span style="clear: both;"></span>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <div class="row justify-content-end"><div class="col-sm-12">

                        <span>Show Entries: </span>
                        <select name="entries" @change="changeLimit($event)" id="" style="width: 20%;">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <div style="display: inline; float: right;">
                            <span>Search: </span>
                            <input type="text" @keyup="findProduct($event)">
                        </div>
                        <span style="clear: both;"></span>




                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">



                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 161.203px;">
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 212.859px;">
                                    Flag
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 197.25px;">
                                    Code
                                </th>

                                <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                                <!--rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"-->
                                <!--style="width: 100px;">-->
                                <!--Current balance-->
                                <!--</th>-->





                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 150.3906px;">Actions</th></tr>
                            </thead>
                            <tbody>

























































                            <tr role="row" class="even" v-for="product in theLaravelData.data" :key="product.id">
                                <!--<td class="sorting_1">{{product.name | shortName}}</td>-->

                                <td>{{product.name}}</td>
                                <!--<td>{{product.email}}</td>-->

                                <td>

                                    <!--<img :src="'/'+product.image" alt="">-->

                                    <img :src="`${product.image}`" alt="" style="width: 80%; height: 40px;">
                                </td>

                                <td>{{product.code}}</td>




                                <td>
                                    <!--<router-link :to="{name: 'product.edit', params: {slug: product.slug}}"  style="font-size: 65%;" class="btn btn-sm btn-warning">Edit</router-link>-->
                                    <button @click="deleteUser(product.id)" class="btn btn-sm btn-danger" style="font-size: 65%;" >Delete</button>
                                    <router-link :to="{name: 'countries.edit', params:{id: product.id }}" class="btn btn-sm btn-info" style="font-size: 65%;" >Edit</router-link>
                                    <!--<button @click="viewUser(product.id)" class="btn btn-sm btn-primary" style="font-size: 65%;" >View</button>-->
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
        computed: {
          theLaravelData() {

            return this.laravelData;

          },
        },


        data() {

            return {

                laravelData: {},
                limit: 10,
                finder: '',

                form2: new FormData(),
                form: {
                    name: '',
                    num: '',
                },
                image: null


            };


        },








        mounted() {
            $(document).on("click", ".browse", function() {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                var reader = new FileReader();
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);


                // get loaded data and render thumbnail.

                reader.onload = function (e) {


                    document.getElementById("preview").src = e.target.result;

                };





            });









            this.getResults();






        },


        created() {




        },





        methods: {

            editUser(id) {
                this.$router.push({name: 'countries.edit', params: {'id': id}})




            },




            deleteUser(id) {


                axios({
                    method: 'delete',
                    url: '/api/countries/'+id,

                }).
                then(res => {




                    this.getResults();

                    if(res.data !== 0) {
                        this.users = res.data;
                    }






                });
            },



            findProduct(ev) {

                this.finder = ev.target.value;
                this.getResults();
            },




            changeLimit(ev) {
                this.limit = ev.target.value;

            },



















            getResults(page = 1) {
                axios({
                    method: 'get',
                    url: '/api/countries?page='+page+"&limit="+this.limit+"&search="+this.finder,
                    headers: {
                        // 'authorization': "Bearer "+localStorage.getItem('token'),
                    }
                })
                    .then(response => {





                        this.laravelData = response.data;


                    });
            },




















            getImage(e) {



                this.form2.append('image', e.target.files[0]);


                return;


                // this.image = e.target.files[0];

                let readder = new FileReader();



                reader.onload = function() {
                    readder.readAsDataURL(e.target.files[0]);




                };


                readAsDataURL(fof);
                //
                // file.onload = (e) => {
                //     console.clear();
                //     console.log(e);
                //
                //  };



                // console.clear();
                // console.dir(e.target.files[0].result);





                // console.log(this.image);





            },
            hitSubmit() {

                this.form2.append('name', this.form.name);
                this.form2.append('code', this.form.num);


                console.log(this._formData);

                axios({
                    'method': 'post',
                    'url': '/api/countries',
                    headers: {
                        'Content-Type': 'Multipar/Form-data',
                    },
                    data: this.form2,




                }).
                then(res => {
                    // console.clear();

                    if(res.data) {
                        this.form.name = '';
                        this.form.num = '';
                        document.getElementById("preview").src = "";

                        this.getResults();


                    }


                });






            },


        },



        beforeDestroy() {




        },



    }










</script>


<style scoped>
    .file {
        visibility: hidden;
        position: absolute;
    }



</style>



