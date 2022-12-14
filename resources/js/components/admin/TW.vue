<template>
<div>



            <div
                    v-for="(key, val) in obj"
                    style="width: 200px; display: inline-block; height: 30px; margin-left: 20px;  background: gray; text-align: center; border-radius: 8px;">
                <strong>Total Balance</strong>
                <span>100</span>






            </div>






</div>




</template>


<script>
    export default {



         created() {




         },
        data() {
          return {
              obj: {'one': 1, 'two': 2, 'three': 3},
          }   ;
        },
        props: ['theData'],
         mounted() {
           console.log('xxx');
           console.log(this.theData);


         },



    }
</script>