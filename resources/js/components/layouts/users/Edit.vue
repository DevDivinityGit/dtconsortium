<template>
    <div>
        <h4 style="margin-left: 30px;">
            edit user
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="name">Name</label>



                            <input type="text" id="name" :value="_user.name" class="form-control">


                        </div>



                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">


                            <label for="email">Email</label>

                            <input id="email" type="text" placeholder="Email" :value="_user.email" class="form-control">



                        </div>


                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">


                            <label for="password">Password</label>
                            <input type="password"  id="password" class="form-control">




                        </div>


                    </div>






                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="balance">Current Balance</label>
                            <input readonly type="number"  id="balance" :value="_user.current_balance" class="form-control">







                        </div>


                    </div>














                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="r_name">Real Name</label>
                            <input type="text"  id="r_name" :value="_user.real_name" class="form-control">







                        </div>


                    </div>





                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text"  id="number" :value="_user.number" class="form-control">







                        </div>


                    </div>










                </div>




                <div class="row">

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="image">User Image</label>


                            <input  id="image" type="file"  @change="uploadImage($event)" class="form-control">







                        </div>








                    </div>


                    <div class="col-sm-6">

                        <div class="card">



                            <img style="width: 300px; height: 200px;" :src="'/'+_user.image" alt="">








                        </div>



                    </div>















                </div>




















                <div class="row">

                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Submit</button>
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
                url: '/api/users/'+id+'/edit',
            }).
                then(res => {

                    console.log(res.data);




               this.user = res.data;

            });







        },

        methods: {
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
                let number = e.target[5].value;



                this.form.append('name', name ? name : '');
                this.form.append('email', email ? email : '');
                this.form.append('password', password ? password : '');
                this.form.append('current_balance', currentBalance ? currentBalance : '');
                this.form.append('real_name', realName ? realName : '');
                this.form.append('number', number ? number : '');



                // console.clear();
                // console.log(password);
                // return;









                axios({
                    method: 'post',
                    url: '/api/users/update/'+this.$route.params.id,
                    data: this.form,
                    headers: {
                        'Content-Type': 'Multipar/Form-data',
                    }

                }).
                then(res => {

                    if(res.data === 401) {
                        alert("number already in use try another one");
                        return;
                    }





                    if(res.data === 200) {
                        this.$router.push({name: 'users'});
                    }


                });
            },
        }



















    }
</script>









