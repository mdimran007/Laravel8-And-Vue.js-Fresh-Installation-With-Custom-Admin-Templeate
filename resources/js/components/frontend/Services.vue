<template>

<div>

         <section id="services" class="services-04 py-6 bg-grey" style="min-height:550px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h6>Services</h6>
                            <!-- <h3>Services</h3>
                            <span>services</span> -->
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
             

                    <div class="col-md-6 col-lg-4" v-for="service,index in data_list">
                        <div class="services-box text-center">
                            <i :class="'fas '+service.service_icon+' services-icon'"></i>
                            <div class="services-content">
                                <h5 class="services-head">{{service.service_title}}</h5>
                                <p v-if="service.service_description.length>=78" class="services-description mb-0" v-html="service.service_description.substring(0,79)+'..'">
                                
                                </p>
                                <p v-else class="services-description mb-0">
                                   {{service.service_description}}
                                </p>

                                <router-link v-if="service.service_description.length>=78" :to="'services-details/'+service.id" class="btn btn-outline-dark btn-sm" style="margin-top:15px;">Details</router-link>
                                <!-- <button type="button" class="btn btn-link" style="margin-top:10px;">Details</button> -->
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

                axios.get('api/services-api')
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