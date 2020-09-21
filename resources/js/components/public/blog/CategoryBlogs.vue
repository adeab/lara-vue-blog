<template>
    <div>
        <div class="col-md-3 w3ls-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s" v-for="blog in allposts" :key="blog.id">
            <div class="tc-ch">
                <div class="tch-img">
                    <a href="singlepage.html">
                        <img :src="'uploadimage/'+blog.photo" class="img-responsive" alt=""></a>
                </div>

                <h3><a href="singlepage.html">{{blog.title}}</a></h3>
                <h6>BY <a href="singlepage.html">{{blog.author}} </a>{{blog.created_at|timeformat}}</h6>
                <p>{{blog.body | sortlength(40,"....")}}</p>
                <div class="bht1">
                    <router-link to="/rkapost">Read More</router-link>
                </div>
                <div class="soci">
                    <ul>
                        <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                        <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        
      

    </div>
</template>
<script>
export default {
    name: "BlogPost",
    computed:{
		allposts(){
			return this.$store.getters.getblogPost
		}
	},
	mounted(){
		this.$store.dispatch("getblogPost")
	} 
    
    
}
</script>
