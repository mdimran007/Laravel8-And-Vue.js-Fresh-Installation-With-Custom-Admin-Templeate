<template>

<div>
    
<!--   Portfolio start  -->
        <section id="portfolio" class="portfolio-02 py-6" style="min-height:550px;">
            <div class="container" style="margin-bottom:20px;"> 
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="title-box">
                            <br>
                            <h6>My Protfolios</h6>
                            
                           <!-- <h5>- My Portfolio -</h5> -->
                            <!-- <span>portfolio</span> -->
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    
                    <!--   Portfolio Filters   -->
                    <!-- <ul id="portfolio-filter" class="list-inline col-lg-12 portfolio-filter">
                        <li class="list-inline-item" >
                            <a href="#" data-filter="*" class="active">All</a>
                        </li>
                        <li v-for="category in category_list" :key="category.id" class="list-inline-item">
                            <a href="#" :data-filter="'.'+category.category_id">{{category.category_name}}</a>
                        </li>
                       
                    </ul> -->
                </div>
                <div class="portfolio-items row" style="margin-bottom:100px;">



                    <!-- Item 01 -->
                    <div v-for="portfolio in portfolio_list.data" :key="portfolio.id" :class="'col-6 col-sm-6 col-md-4 col-lg-3 portfolio-item '+portfolio.category_id">
                        
                        <span v-if="portfolio.title">
                        <div  class="portfolio-box">
                           
                            <div class="portfolio-img">
                                <img :src="portfolio.images" alt="/">
                            </div>
                            <div class="portfolio-overlay">
                                <div class="portfolio-overlay-content">
                                    <h5 class="portfolio-category">{{portfolio.title}}</h5>
                                    <div class="portfolio-icon">
                                        <router-link :to="'portfolio-details/'+portfolio.id">
                                            <i class="fas fa-link"></i>
                                        </router-link>
                                        <router-link :to="portfolio.images" class="js-zoom-gallery">
                                            <i class="fas fa-search-plus"></i>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        </span>
                        <span v-else>Data Not Found</span>
                       
                    </div>
                   
                    



                   
                    
                </div>
                <pagination :data="portfolio_list" align="center" @pagination-change-page="getAllportfolio"></pagination>
            </div>
            
        </section>
        <!--    Portfolio  End  -->      

        

        <br>
</div>
    
</template>

<script>
    export default {

      data () {
            return {
              category_list:[],
              portfolio_list:{},
              total: 1,
              pageInfo: null,
            }
        },

         methods:{
            
            getAllcategory() {

                let loader = this.$loading.show({
                  // Optional parameters
                    container: this.$refs.loadingContainer,
                    color: '#E12D1E',
                    loader: 'bars',
                    width: 64,
                    height: 64,
                    backgroundColor: '#ffffff',
                    opacity: 1,
                    zIndex: 999,
                    
                });  

                axios.get('api/portfolio-category-api')
                    .then(response => {
                        this.category_list=response.data
                        loader.hide();
                        //console.log(this.category_list);
                    })
            },

            getAllportfolio(page=1) {

               let loader = this.$loading.show({
                  // Optional parameters
                    container: this.$refs.loadingContainer,
                    color: '#E12D1E',
                    loader: 'bars',
                    width: 64,
                    height: 64,
                    backgroundColor: '#ffffff',
                    opacity: 1,
                    zIndex: 999,
                    
                });  

                axios.get('api/portfolio-api?page=' + page)
                    .then(response => {
                        this.portfolio_list=response.data 
                       loader.hide();
                    })
            },


           
           
        },

        mounted() {
            console.log('Component mounted.'),

            this.getAllcategory();
            this.getAllportfolio();


        }
    }
</script>