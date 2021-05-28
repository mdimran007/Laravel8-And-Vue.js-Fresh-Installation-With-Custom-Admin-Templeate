<template>

<div>

         <section id="services" class="services-04 py-6 bg-grey" style="min-height:550px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h6>Portfolio Details</h6>
                            <!-- <h3>Services</h3>
                            <span>services</span> -->
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
             
                    <div class="col-md-12 col-lg-12">
                     <div class=" text-center" style="padding: 42px 30px; margin-top: 30px; transition: all 0.5s ease; background-color: #ffffff; border-radius: 8px;">
                            

                            <div class="services-content">

                                <h5 v-if="data_list.title" class="services-head" style="margin-bottom:15px;">{{data_list.title}}</h5>

                                
               

                                <img :src="data_list.images" class="text-center" style="max-height:300px; max-width:300px; margin:auto;"/>

                                <p class="services-description mb-0" style="margin-top:20px;" v-html="data_list.desc">
                                  
                                </p>

                                <p v-if="data_list.url" class="services-description mb-0" style="margin-top:10px;">
                                   <a  :href="data_list.url" target="_blank">Demo Link</a>
                                </p>
                                <p class="services-description mb-0" v-else>
                                   Portfolio Not Found!
                                </p>

                               </div>
                        </div>
                    </div>
                   


                </div>
            </div>
        </section>
              
</div>
    
</template>

<script>

    export default {
      data () {
            return {
              data_list:[],
              id:this.$route.params.id,
            }
        },

         methods:{
            
            getAlldata() {

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

                axios.get('/api/portfolio-api/'+this.id)
                    .then(response => {
                        this.data_list=response.data
                        loader.hide();
                    })
            },

           
        },

        mounted() {
            console.log('Component mounted.'),

            this.getAlldata();
        }
    }
</script>