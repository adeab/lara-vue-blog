<template>
    <div>
        <div class="container">
            <div class="grid_3 grid_5">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div v-for="(group,i) in groups" :key="group" :class="i == 0 ? 'item active' : 'item'">
                            <div class="col-md-4 col-sm-5 tab-image customHovereffect"
                                v-for="cat in getallcategories.slice(i * 3, (i + 1) * 3)" :key="cat.id">
                                <!--  -->
                                <img :src="'frontEnd/images/m2.jpg'" class="img-responsive" alt="Wanderer">
                                <div class="overlay">
                                    <h2>{{cat.name}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        name: "CategorySlider",
        computed: {
            // get all the categories from the store.js file connection 
            getallcategories() {
                return this.$store.getters.allcategories;
               },
            //get catageroy groups with 3 in each group. to show 3 at a time in the carousel
            groups() {
                return Array.from(Array(Math.ceil(this.$store.getters.allcategories.length / 3)).keys())
            }
        },
        mounted() {
            this.$store.dispatch('allcategories');
        }
    }

</script>
