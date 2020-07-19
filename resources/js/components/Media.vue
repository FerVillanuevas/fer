<template>
    <div>
        <input :name="this.name" v-on:click="showMedia" :value="selectedMedia ? selectedMedia.id : ''" data-toggle="modal" data-target="#exampleModal"/>
        <!-- Modal -->
        <div v-if="show" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4" v-for="media in medias" :key="media.id">
                            <figure :class="`figure`"  v-on:click="selectedMedia = media">
                                <div :class="`img-overlay rounded position-relative overflow-hidden ${selectedMedia == media ? 'active' : ''}`">
                                    <img :src="`/${media.path}`" class="figure-img img-fluid m-0">
                                </div>
                                <figcaption class="figure-caption">A caption for the above image.</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" v-if="selectedMedia">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'name': String
    },
    data: function () {
       return {
            selectedMedia: null,
            show: false,
            medias: []
       }
    },
    methods: {
        showMedia() {
            this.show = true
            if(this.medias.length == 0) {
                axios.get('/api/media')
                    .then((res) => {
                        this.medias = res.data
                    });
            }
        }
    }
}
</script>

<style scoped>
    .active::after {
        content: '';
        background: rgb(33 37 41 / 60%);
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
    .img-overlay:active {
        transform: scale(1.5);
        transition: transform .3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        z-index: 4;
    }
</style>
