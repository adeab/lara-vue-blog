<template>
    <div>
        <featuredSlider></featuredSlider>
        <allBlogs></allBlogs>
    </div>

</template>


<script>
import featuredSlider from "../public/blog/FeaturedSlider.vue";
import allBlogs from "../public/blog/BlogPost.vue";

    export default {
        name: "PublicHome",
        components: {
            featuredSlider,
            allBlogs,
        }

    }

</script>
