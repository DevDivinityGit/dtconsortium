<template>
    <div>
        <h4 style="margin-left: 50px;">
            Update USDT Address
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">usdt address</label>


                        <input type="text" v-model="form.name" id="name"  class="form-control">
                    </div>
                    <!--<div class="col-sm-6">-->
                    <!--<input type="text" placeholder="status" class="form-control">-->
                    <!--</div>-->



                    <!--<div class="col-sm-6">-->
                    <!--<label for="price">ISO Link</label>-->

                    <!--<input type="text"  v-model="form.iso_link" class="form-control" id="price">-->
                    <!--</div>-->



                    <!--<div class="col-sm-12">-->
                    <!--<label for="text">Text</label>-->

                    <!--<textarea name="" id="text" cols="15"  v-model="form.text" class="form-control" rows="5"></textarea>-->





                    <!--</div>-->















                    <!--<div class="col-sm-6">-->
                    <!--<input type="text"  placeholder="Password" class="form-control">-->
                    <!--</div>-->

                    <!--<div class="col-sm-6">-->
                    <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->








                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <input class="form-control" type="file" @change="showImage($event)">
                    </div>
                </div>



                <div  class="row">

                    <div class="col sm-3" id="upload-box">
                        <img :src="form.image" alt="" style="width: 30%; height: 300px;">
                    </div>

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
                form: {
                    name: '',
                    image: null,
                },
            };
        },

        created() {

            axios({
                method: 'get',
                url: '/api/address',
                data: this.form,
            }).
            then(res => {









                this.form.name = res.data.address;
                this.form.image = res.data.image;






                // if(res.data === 200) {
                //     this.$router.push({name: 'videos.index'});
                // }


            });



        },



        methods: {
            showImage(e) {









                const image = new FileReader();











                // this.images.push(image[0]);
                image.readAsDataURL(e.target.files[0]);






                image.onload = (e) => {

                    let imageBase = e.target.result;







                    let el = `<img src="${imageBase}" style="width: 30%; height: 300px;">`;

                    this.form.image = imageBase;




                    // const div = document.createElement('div');
                    // div.classList.add('col-sm-3');

                    // div.innerHTML = el;
                    // if(imageBase) {
                    //     this.theFiles.push(imageBase);
                    //     // that.images.push(imageBase);
                    // }


                    document.getElementById('upload-box').innerHTML = el;












                }








            },























            sendForm(e) {



                ;



                axios({
                    method: 'post',
                    url: '/api/address',
                    data: this.form,


                    // headers: {
                    //     'Content-Type': 'Multipar/Form-data',
                    //     'Accept': 'application/json',
                    // }






                }).
                then(res => {
                    console.log(res.data);






                    // if(res.data === 200) {
                    //     this.$router.push({name: 'videos.index'});
                    // }


                });

















            },
        }




    }

</script>

