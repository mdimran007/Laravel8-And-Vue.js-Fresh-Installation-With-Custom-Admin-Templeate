<template>

<div>   


<!--   About Start   -->
         <section id="about" class="about-04 py-6 about-04">
            <div class="container">
                 <div class="row">
                        <div class="col-lg-12">
                            <div class="title-box">
                                <h6 style="float:right;">About</h6>
                               <!--  <h3>Resume</h3>
                                <span>Resume</span> -->
                            </div>
                        </div>
                    </div>
                <div class="row mt-0 mt-lg-5">
                    <div class="col-lg-6 personal-item">
                        <h2 class="mb-2">Personal Info</h2>
                        <hr>
                        <div class="row">
                            <div class="col-6 col-lg-5 personal-info">
                                <ul class="list-unstyled">
                                    <li>Name : <small> {{personalinfo_list.name}}</small></li>
                                    <!-- <li>Birthday : <small>1 April 1990</small></li> -->
                                    <li>Title : <small> {{personalinfo_list.title}}</small></li>
                                    <li>Education : <small> {{personalinfo_list.degree}}</small></li>
                                    
                                    <li>Freelance : <small> {{personalinfo_list.freelance}}</small></li>
                                    <li>Location : <small> {{personalinfo_list.location}}</small></li>
                                </ul>
                            </div>
                            <div class="col-6 col-lg-5 personal-info">
                                <ul class="list-unstyled">
                                    <li>Email : <small>{{personalinfo_list.email}}</small></li>
                                    <li>Mobile : <small>+123 {{personalinfo_list.mobile}}</small></li>
                                    <li>Skype : <small>{{personalinfo_list.skype}}</small></li>
                                    <li>Whatsapp : <small>{{personalinfo_list.whatsapp}}</small></li>

                                    
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <div class="social-icon">
                                    <ul class="list-inline py-2 mb-0">
                                        <li class="list-inline-item"><a :href="personalinfo_list.facebook"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.youtube"><i class="lni lni-youtube"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.linkedin"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.twitter"><i class="lni lni-twitter-filled"></i></a></li>
                                        <li class="list-inline-item"><a :href="personalinfo_list.website"><i class="lni lni-world"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="count-up">
                            <div class="counted-box-02">
                                <div class="row">
                                    <!-- Item-01 -->
                                    <div class="col-6 count-item">
                                        <div class="count-content">
                                            <span class="timer count-number" data-from="0" :data-to="getcount_list.get_award" data-speed="5000">0</span>
                                        <p class="mb-0">Get Award</p>
                                        </div>
                                    </div>
                                    <!-- Item-01 -->
                                    <div class="col-6  count-item">
                                        <div class="count-content">
                                            <span class="timer count-number" data-from="0" :data-to="getcount_list.research_paper" data-speed="5000">0</span>
                                            <p class="mb-0">Research Paper</p>
                                        </div>
                                    </div>
                                    <!-- Item-03 -->
                                    <div class="col-6  count-item">
                                        <div class="count-content">
                                            <span class="timer count-number" data-from="0" :data-to="getcount_list.project_done" data-speed="5000">0</span>
                                        <p class="mb-0">Project Done</p>
                                        </div>
                                    </div>
                                    <!-- Item-04 -->
                                    <div class="col-6  count-item">
                                        <div class="count-content">
                                            <span class="timer count-number" data-from="0" :data-to="getcount_list.happy_clients" data-speed="5000">0</span>
                                        <p class="mb-0">Happy Client</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    Resume Start   -->
                
                   
                <!--     Resume End    -->
            </div>
        </section>
        <!--   About End   -->
</div>
    
</template>

<script>
    export default {

      data () {
            return {
              id:1,
              personalinfo_list:[],
              getcount_list:[],
            }
        },

         methods:{
            
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

            getCount() {

                axios.get('api/about-getcount-api/'+this.id)
                    .then(response => {
                        this.getcount_list=response.data
                    
                    })
                    .catch(function (error) {
                        console.log(error);
                       
                    })
            },


           
           
        },

        mounted() {
            console.log('Component mounted.'),

            this.getPersonalInfo();
            this.getCount();


        }
    }
</script>