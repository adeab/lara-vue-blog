<template>
    <div>
        <div class="container">
    <div class="grid_3 grid_5">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">

                <div class="item active">


                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/m2.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/m1.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/m3.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                
                </div>
                <div class="item">
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/t1.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/t2.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <a>
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/t3.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    

                </div>
                <div class="item">
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/f2.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/f4.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 tab-image customHovereffect">
                        <img :src="'frontEnd/images/f3.jpg'" class="img-responsive" alt="Wanderer">
                        <div class="overlay">
                            <h2>Category Name</h2>
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
    }

</script>
