<template>
    <div>
        <h4 style="margin-left: 20px;">
            Update Task
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">Name</label>


                        <input type="text" :value="_task.name" id="name" placeholder="name" class="form-control">
                    </div>
                    <!--<div class="col-sm-6">-->
                    <!--<input type="text" placeholder="status" class="form-control">-->
                    <!--</div>-->



                    <!--<div class="col-sm-6">-->
                    <!--<label for="price">Price</label>-->

                    <!--<input type="number" placeholder="price" class="form-control" id="price">-->
                    <!--</div>-->



                    <div class="col-sm-6">
                        <label for="category_id">Category</label>



                        <select name="" id="category_id"  class="form-control">

                            <option value="1">Youtube</option>
                            <option value="2">Facebook</option>
                            <option value="3">TikTok</option>



                        </select>
                    </div>


                    <div class="col-sm-6">
                        <label for="link">Add task link</label>
                        <input type="text" :value="_task.task_link" id="link" class="form-control">




                    </div>




                    <div class="col-sm-6">
                        <label for="demand">Demand</label>
                        <input :value="_task.demand" type="number" id="demand" class="form-control">




                    </div>









                    <div class="col-sm-6">
                        <label for="desc">Description</label>
                        <textarea name="" id="desc" cols="20"
                                  class="form-control"
                                  :value="_task.description"
                                  rows="5"></textarea>




                    </div>










                    <!--<div class="col-sm-6">-->
                    <!--<input type="text"  placeholder="Password" class="form-control">-->
                    <!--</div>-->

                    <!--<div class="col-sm-6">-->
                    <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->









                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>








            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new FormData(),
                task: null,
            };
        },
        computed: {

          _task() {
           return this.task;


          },


        },


        mounted() {
            axios({
                method: 'get',
                url: '/api/tasks/'+this.$route.params.id,
            }).
                then(res => {
                    this.task = res.data;
            });





        },



        methods: {
            uploadImage(e) {

                this.form.append('image', e.target.files[0]);
            },



            sendForm(e) {
                let name = e.target[0].value;
                // let price = e.target[1].value;


                let description = document.getElementById('desc').value;
                let link = document.getElementById('link').value;
                let demand = document.getElementById('demand').value;





                let category_id = document.getElementById('category_id').value;





                // let password = e.target[2].value;



                this.form.append('name', name);
                // this.form.append('price', price);
                this.form.append('category_id', category_id);
                this.form.append('description', description);
                this.form.append('task_link', link);
                this.form.append('demand', demand);

                // this.form.append('password', password);









                axios({
                    method: 'post',
                    url: '/api/tasks-update/'+this.$route.params.id,
                    data: this.form,
                    // headers: {
                    //     'Content-Type': 'Multipar/Form-data',
                    // }

                }).
                then(res => {
                   if(res.data === 200) {


                       this.$router.push({name: 'tasks.index'});
                   }



                    // console.clear();
                    // console.log(res.data);
                    // return;




                    // console.clear();
                    // console.log(res.data);
                    // return;







                });
            },
        }




    }

</script>

