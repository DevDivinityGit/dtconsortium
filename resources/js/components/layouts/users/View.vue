<template>
    <div>
        <h4 style="margin-left: 30px;">
             user details
        </h4>
        <div class="container">
            <form  @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="name">Name</label>



                            <input type="text" readonly id="name" :value="_user.name" class="form-control">


                        </div>



                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">


                            <label for="email">Email</label>

                            <input id="email" type="text" readonly placeholder="Email" :value="_user.email" class="form-control">



                        </div>


                    </div>

                    <!--<div class="col-sm-6">-->

                        <!--<div class="form-group">-->


                            <!--<label for="password">Password</label>-->
                            <!--<input type="password"  readonly id="password" class="form-control">-->




                        <!--</div>-->


                    <!--</div>-->






                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="balance">Current Balance</label>
                            <input type="number"  readonly id="balance" :value="_user.current_balance" class="form-control">







                        </div>


                    </div>














                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="r_name">Real Name</label>
                            <input type="text"  id="r_name" readonly :value="_user.real_name" class="form-control">







                        </div>


                    </div>
















                </div>





                <div class="row">
























                </div>

























                <div class="row">

                    <div class="col-sm-6">

                        <div class="form-group">


                            <div class="form-group">
                                <label for="r_name">Number</label>
                                <input type="text"  id="r_name" readonly :value="_user.number" class="form-control">







                            </div>






                        </div>








                    </div>


                    <div class="col-sm-6">

                        <div class="card">



                            <img @click="hitImg()" class="the-img"  style="cursor: pointer; width: 300px; height: 200px;" :src="'/'+_user.image" alt="">








                        </div>



                    </div>















                </div>




                <div class="row">
                    <h3>Submitted Tasks</h3>
                    <hr>
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">



                        <thead>
                        <!--<tr role="row">-->
                        <!--<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">-->
                        <!--user Name-->
                        <!--</th>-->






                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">
                            Task Name
                        </th>
                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                        <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                        <!--style="width: 100px;">-->
                        <!--Category-->
                        <!--</th>-->

                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                        <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                        <!--style="width: 100px;">-->
                        <!--price-->
                        <!--</th>-->





                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 100px;">
                            Status
                        </th>



                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 20px;">
                            Link
                        </th>







                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                            <!--rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"-->
                            <!--style="width: 20px;">-->
                            <!--remaining-->
                        <!--</th>-->



                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 20px;">
                            image
                        </th>












                        </tr>
                        </thead>
                        <tbody>

                        <tr role="row" class="even" v-for="product in _user.tasked" :key="product.id">
                            <!--<td class="sorting_1">{{product.name | shortName}}</td>-->
                            <td>
                                {{product.name}}
                            </td>

                            <td>
                                {{product.pivot.task_status}}
                            </td>
                            <td>
                                <input type="text" :value="product.task_link" readonly class="form-control">

                            </td>


                            <td>

                                <img @click="hitImg()" class="the-img"  style="cursor: pointer; width: 50px; height: 30px;" :src="'/'+product.image" alt="">

                            </td>














                            <!--<router-link :to="{name: 'product.edit', params: {slug: product.slug}}"  style="font-size: 65%;" clas---s="btn btn-sm btn-warning">Edit</router-link>-->

                            <!--<button v-if="product.status == 'inprogress'" @click="hitAcceptance(product.id, product.user.id)"  class="btn btn-sm btn-success" style="font-size: 65%;" >Acceptance</button>-->
                            <!--<button  v-if="product.status == 'inprogress'" @click="hitRejection(product.id, product.user.id)" class="btn btn-sm btn-danger" style="font-size: 65%;" >Rejection</button>-->
                            <!--&lt;!&ndash;<button  v-if="product.status === 'Accepted'" @click="hitRestore(product.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>&ndash;&gt;-->
                            <!--<button  v-if="product.status === 'Rejected'" @click="hitRestore(product.id, product.user.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>-->



                        </tr>






                        <tr v-if="_user.tasked.length === 0">
                            <td>
                                No record found
                            </td>

                        </tr>



                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>

                </div>

                <br>
                <br>
                <div class="row">
                    <h3>Transactions</h3>
                    <hr>


                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">



                        <thead>
                        <!--<tr role="row">-->
                        <!--<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">-->
                        <!--user Name-->
                        <!--</th>-->






                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">
                            Transaction id#
                        </th>
                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                        <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                        <!--style="width: 100px;">-->
                        <!--Category-->
                        <!--</th>-->

                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                        <!--rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"-->
                        <!--style="width: 100px;">-->
                        <!--price-->
                        <!--</th>-->





                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 100px;">
                            Amount
                        </th>








                        <!--<th class="sorting" tabindex="0" aria-controls="example1"-->
                        <!--rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"-->
                        <!--style="width: 20px;">-->
                        <!--remaining-->
                        <!--</th>-->



                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 20px;">
                            Image
                        </th>


                        <th class="sorting" tabindex="0" aria-controls="example1"
                            rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                            style="width: 20px;">
                            Status
                        </th>












                        </tr>
                        </thead>
                        <tbody>

                        <tr role="row" class="even" v-for="product in _user.tr" :key="product.id">
                            <!--<td class="sorting_1">{{product.name | shortName}}</td>-->


                            <td>
                                {{product.transaction_id}}
                            </td>



                            <td>
                                {{product.amount}}
                            </td>








                            <td>

                                <img @click="hitImg()" class="the-img"  style="cursor: pointer; width: 50px; height: 30px;" :src="'/'+product.image" alt="">

                            </td>



                            <td>
                                {{product.status}}
                            </td>














                            <!--<router-link :to="{name: 'product.edit', params: {slug: product.slug}}"  style="font-size: 65%;" clas---s="btn btn-sm btn-warning">Edit</router-link>-->

                            <!--<button v-if="product.status == 'inprogress'" @click="hitAcceptance(product.id, product.user.id)"  class="btn btn-sm btn-success" style="font-size: 65%;" >Acceptance</button>-->
                            <!--<button  v-if="product.status == 'inprogress'" @click="hitRejection(product.id, product.user.id)" class="btn btn-sm btn-danger" style="font-size: 65%;" >Rejection</button>-->
                            <!--&lt;!&ndash;<button  v-if="product.status === 'Accepted'" @click="hitRestore(product.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>&ndash;&gt;-->
                            <!--<button  v-if="product.status === 'Rejected'" @click="hitRestore(product.id, product.user.id)" class="btn btn-sm btn-info" style="font-size: 65%;" >Restore</button>-->



                        </tr>




                        <tr v-if="_user.tr.length === 0">
                            <td>
                                No record found
                            </td>

                        </tr>





                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>







                </div>


























                <!--<div class="row">-->

                    <!--<div class="col-sm-6">-->
                        <!--<button class="btn btn-primary" type="submit">Submit</button>-->
                    <!--</div>-->


                <!--</div>-->




            </form>
        </div>
    </div>
</template>
<script>
    export default {
        data() {

            return {
                user: {},
                form: new FormData(),
            };


        },
        computed: {
            _user() {

                return this.user;

            },


        },
        created() {





            let id = this.$route.params.id;


            axios({
                method: 'get',
                url: '/api/user/details/'+id,
            }).
            then(res => {

                console.log(res.data);




                this.user = res.data;

            });







        },

        methods: {


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












            uploadImage(e) {
                console.clear();
                this.form.append('image', e.target.files[0]);
            },



            sendForm(e) {
                let name = e.target[0].value;
                let email = e.target[1].value;
                let password = e.target[2].value;
                let currentBalance = e.target[3].value;
                let realName = e.target[4].value;



                this.form.append('name', name);
                this.form.append('email', email);
                this.form.append('password', password);
                this.form.append('current_balance', currentBalance);
                this.form.append('real_name', realName);









                axios({
                    method: 'post',
                    url: '/api/users/update/'+this.$route.params.id,
                    data: this.form,
                    headers: {
                        'Content-Type': 'Multipar/Form-data',
                    }

                }).
                then(res => {





                    if(res.data === 200) {
                        this.$router.push({name: 'users'});
                    }


                });
            },
        }



















    }
</script>









