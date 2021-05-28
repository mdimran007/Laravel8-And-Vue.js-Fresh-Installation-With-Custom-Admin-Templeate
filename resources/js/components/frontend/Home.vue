<template>
<div>

     <section class="hero-03" id="hero" style="min-height:550px;">
            <div class="container">
                <div class="hero-content">
                    <div class="row" style="margin-top:20px;">

                        <div class=" col-lg-4">
                            <div class="personal-img">
                                
                                <img :src="homedata.images">
                            </div>
                        </div>
                        <div class="col-lg-8 personal-item">
                            <div class="mt-5">
                                <h1 class="mb-0 personal-name">Hi, I am <span class="base-color"> {{homedata.full_name}}</span></h1>
                                <h2 class="personal-discription">{{homedata.work_title}}</h2>
                                <p class="mb-0 w-75" >{{homedata.details}}</p>

                                 <div class="social-icon" style="margin-top:10px;">
                                    <ul class="list-inline py-2 mb-0">
                                        <li class="list-inline-item"><a :href="personalinfo_list.facebook"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.youtube"><i class="lni lni-youtube"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.linkedin"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.twitter"><i class="lni lni-twitter-filled"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.website"><i class="lni lni-world"></i></a></li>
                                    </ul>
                                </div>

                                <span v-if="homedata.cv_doc!=null">
                                <a href="javascript:void(0);" class="black-pill-button-01 mt-4">Download CV</a>
                                </span>
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
                homedata: {
                    id:'',
                    images:'',
                    full_name: '',
                    work_title: '',
                    details: '',
                    cv_doc: '',
            
                },
                
                id:1,
                personalinfo_list:[],

                
               

            }
        },
        methods:{

               
            

           getData() {

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

                axios.get('/api/home-api/'+this.id)
                    .then(response => {
                        this.homedata=response.data;
                        loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },

            loaderFunction() {

                           
          

            },

                        getPersonalInfo() {
                
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
                axios.get('/api/about-personalinfo-api/'+this.id)
                    .then(response => {
                    this.personalinfo_list=response.data
                    loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },
           
            

        },
        mounted() {
       
            this.getPersonalInfo();
            this.getData();

        }
    }
</script>