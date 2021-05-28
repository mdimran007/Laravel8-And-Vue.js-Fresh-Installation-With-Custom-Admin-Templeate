<template>

<div>

         <section id="services" class="services-04 py-6 bg-grey" style="min-height:550px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h6>Services Details</h6>
                            <!-- <h3>Services</h3>
                            <span>services</span> -->
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
             
                    <div class="col-md-12 col-lg-12">
                     <div class="text-center" style="padding: 42px 30px; margin-top: 30px; transition: all 0.5s ease; background-color: #ffffff; border-radius: 8px;">
                            <i v-if="data_list.service_icon" :class="'fas '+data_list.service_icon+' services-icon'"></i>
                            <div class="services-content">
                                <h5 v-if="data_list.service_title" class="services-head">{{data_list.service_title}}</h5>

                                <p v-if="data_list.service_description" class="services-description mb-0" v-html="data_list.service_description">
                                   
                                </p>
                                <p class="services-description mb-0" v-else>
                                   Service Not Found!
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

                axios.get('/api/services-api/'+this.id)
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