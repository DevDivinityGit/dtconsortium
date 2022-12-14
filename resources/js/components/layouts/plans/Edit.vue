<template>
    <div>
        <h4 style="margin-left: 30px;">
            Edit Plan
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" id="name" :value="_plan.name" class="form-control">

                        </div>





                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="limit">Task Limit</label>


                            <input type="number"  id="limit" :value="_plan.limit"  class="form-control">


                        </div>









                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="price">Price</label>



                            <input type="text"  id="price" :value="_plan.price"  class="form-control">

                        </div>




                    </div>



                    <div class="col-sm-6">
                        <div class="form-group">

                            <label for="desc">Description</label>
                            <input type="text"  id="desc" :value="_plan.description"  class="form-control">


                        </div>





                    </div>




                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="task_price">Task Price</label>
                        <input type="text"  id="task_price" :value="_plan.task_price"  class="form-control">


                        </div>







                    </div>

                    <!--<div class="col-sm-6">-->
                    <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->





                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>




                    </div>
                </div>








            </form>
        </div>
    </div>
</template>



<script>
    export default  {
        data() {

            return {
              plan: {},
                form: new FormData(),
            };

        },
        computed: {
          _plan() {
            return this.plan;
          },
        },
        created() {
            let id = this.$route.params.id;

             axios({
                 method: 'get',
                 url: '/api/plans/'+id,
             }).
                 then(res => {


                     this.plan = res.data;


             });








        },


        methods: {

            sendForm(e) {
                const data = {};
                data.name = e.target[0].value;
                data.limit = e.target[1].value;
                data.price  = e.target[2].value;
                data.description = e.target[3].value;
                data.task_price = e.target[4].value;











                let id = this.$route.params.id;
                axios({
                    method: 'put',
                    url: '/api/plans/'+id,
                    data: data,
                    // headers: {
                    //     'Content-Type': 'Multipar/Form-data',
                    // }

                }).
                then(res => {




                    if(res.data === 200) {

                        this.$router.push({name: 'plans'});
                    }


                });
            },







        },



    }
</script>