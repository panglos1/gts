<template>
    <div @click="closeModal()">
        <div class="row">
			<div v-for="project in projects" :key="project.ID" class="col-md-4">
				<div class="project">
                    <div @click.stop class="img d-flex align-items-center" data-toggle="modal" data-target="#exampleModal" data-whatever="" v-bind:style="{ backgroundImage: 'url(' + project.image + ')' }">
                        <button @click="showModal(project.image)"class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-eye"></span></button>
                    </div>
                    <div class="text text2">
						<p><span>{{project.address }} </span> </p>
					</div>
                </div>
            </div>
            <modelCom v-show="isModalVisible" @close="closeModal" :ImagePath='""+path+""'></modelCom> 
        </div>
    </div>

</template>

<script>
import modelCom from "./Model.vue";

export default 
{ 
    components: {
        modelCom
    },
    props: ['projects'],
    data() {
    return {
        isModalVisible: false,
        path:null,
    };
  },

    methods: {
        showModal(image) {
            if(!this.isModalVisible)
            {
                this.path = image;
                this.isModalVisible = true;
            }
            else
                this.isModalVisible = false;
        },
        closeModal() {
            this.isModalVisible = false;
      },

    },
    created() {
       console.log(this.projects);
    },

}
</script>
