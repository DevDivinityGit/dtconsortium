<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark" style="margin-left: 30px;">Edit Country </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Edit Country </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>













        <div class="container">
            <div class="row">
                <div class="ml-2 col-sm-6">
                    <div id="msg"></div>
                    <form method="post" id="image-form">
                        <input @change="getImage($event)" type="file" name="img[]" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse2 btn btn-primary">Browse...</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ml-2 col-sm-6" id="preview-boz">
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
                    <button @click="hitSubmit()" class="btn btn-primary">Update Country</button>
                </div>







            </div>
        </div>








        <!--<img v-if="_country" :src="_country.image" alt="">-->








    </div>
</template>
<script>
    export default {

        data() {

            return {
                country: null,


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




        computed: {

            _country() {

                return this.country;



            },


        },


        watch: {
          country(newVal, oldVal) {


            let img = newVal.image;


            // this.from.num = newVal.code;
              this.form.name = newVal.name;
              this.form.num = newVal.code;



              document.getElementById("preview").src = "/"+img;



          },



        },






        methods: {











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
                this.form2.append('id', this.$route.params.id);


                console.log(this._formData);

                axios({
                    'method': 'post',
                    'url': '/api/countries/get-updated',
                    headers: {
                        'Content-Type': 'Multipar/Form-data',
                    },
                    data: this.form2,




                }).
                then(res => {



                    if(res.data === 200) {
                       this.$router.push({name: 'countries.index'});

                    }


                });






            },







        },
        mounted() {









            $(document).on("click", ".browse2", function() {
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













        },
        created() {

          axios({
              method: 'get',
              url: '/api/countries/'+this.$route.params.id,
          }).
          then(res => {


                 this.country =    res.data;


                 // alert(this.country.image);



                 // this.loadImage(res.data.image);





              // document.getElementById("preview").src = "./".res.data.image;


          });

        },







    }













</script>


<style scoped>
    .file {
        visibility: hidden;
        position: absolute;
    }



</style>
