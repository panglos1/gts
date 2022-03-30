<template>
    <!-- <div v-show="isModalVisible">
        <div class="costum-model">
            <div class="model" @click.stop>
            <button @click.start @click="closeModal()" type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <Vr360 :imgSrc=ImagePath />
            </div>
        </div>    
    </div> -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
                <Vr360 :imgSrc=ImagePath />

          </div>
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
    margin-left:400px;
    margin-top:400px;
}
</style>