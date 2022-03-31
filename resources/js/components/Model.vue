<template>
    <div v-show="isModalVisible">
        <div class="costum-model">
            <div class="model" @click.stop>
            <Vr360 :imgSrc='ImagePath' />
            </div>
        </div>    
    </div> 
</template>

<script>

import Vr360 from "vue-360vr";

export default 
{ 
    components: {
        Vr360
  },
    data() {
    return {
        isModalVisible: false,
    };
  },
    props: ['ImagePath'],
    methods: {
        closeModal() {
            this.isModalVisible = false;
      },

    },

}
</script>
<style>
.myCanvas[data-v-fc157f02] {
    width:500px !important;
    height:400px !important;
}
.costum-model {
    
    align-items:center;
    background:rgba(0, 0, 0, 0.7);
    bottom:0;
    display:flex;
    justify-content:center;
    left: 0;
    position:absolute;
    right:0;
    top:0;
}
.costum-model .model{
    margin-left:50%;
    margin-top:20%;
}
</style>