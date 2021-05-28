<template>

<div>
  <!--   Contact Start   -->
        <section id="contact" class="contact-02 py-6 bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h6>Contact</h6>
                            <!-- <h3>contact</h3>
                            <span>contact</span> -->
                        </div>
                    </div>
                </div>
                <div class="row contact-info mt-5">
                    <!--  Item 01 -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <div class="item-icon">
                                <i class="fas fa-envelope-open"></i>
                            </div>
                            <div class="info-text">
                                <h5 class=" mb-0">Mail Me</h5>
                                <small>{{data_list.email}}</small>
                            </div>
                        </div>
                    </div>
                    <!--  Item 02 -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <div class="item-icon">
                                <i class="fas fa-phone-square"></i>
                            </div>
                            <div class="info-text">
                                <h5 class="mb-0">Call Me</h5>
                                <small>+88 {{data_list.mobile}}</small>
                            </div>
                        </div>
                    </div>
                    <!--  Item 03 -->
                    <div class="col-md-4">
                        <div class="info-box">
                            <div class="item-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="info-text">
                                <h5 class="mb-0">Location</h5>
                                <small>{{data_list.location}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                                   
                                        <!-- <div :v-if="'errors)>0'" :v-for="'error in errors->all()'" class="alert alert-warning border-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                            </button>
                                            <strong>Warning!</strong> {{ $error }}
                                        </div> -->

                

                <!-- <div  :v-if="'feedbacks.length>=0'">
                        <span  v-for="feedback in feedbacks" style="color:red" v-text="feedback" ></span>
                </div> -->
                                   
                               
                    <div class="col-lg-12 mt-5">
                        <div class="contact-box">
                            <div class="contact-form">
                                <form id="contactForm" @submit.prevent="save">
                                    <div class="row">
                                        <div class="col-lg-6 form-item">
                                            <div class="form-group">
                                                <input id="name" type="text" class="form-control" placeholder="First name*" v-model="form.f_name" name="f_name" required >
                                                <has-error :form="form" style="color:red;" field="f_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-item">
                                            <div class="form-group">
                                                <input  id="family" type="text" class="form-control" placeholder="Last name*" v-model="form.l_name" name="l_name" required >
                                                <has-error :form="form" style="color:red;" field="l_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-item">
                                            <div class="form-group">
                                                <input  id="email" type="email" class="form-control" placeholder="Your email*" v-model="form.email" name="email" required >
                                                <has-error :form="form" style="color:red;" field="email"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 form-item">
                                            <div class="form-group">
                                                <input  id="phone" type="number" class="form-control" placeholder="Mobile number*" v-model="form.mobile" name="mobile" required >
                                                <has-error :form="form" style="color:red;" field="mobile"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-12 form-item">
                                            <div class="form-group">
                                                <textarea  id="comments" rows="4" class="form-control textarea" placeholder="Your message*" v-model="form.msg" name="msg" required></textarea>
                                                <has-error :form="form" style="color:red;" field="msg"></has-error>
                                            </div>
                                        </div>

                                        <!--error msg show-->
                                        <ul>
                                            <li v-if="this.feedbacks.f_name" style="color:red; margin-left:20px;" >You can only use the alphabet for the first name.</li>
                                            <li v-if="this.feedbacks.l_name" style="color:red; margin-left:20px;" >You can only use the alphabet for the last name.</li>
                                            <li v-if="this.feedbacks.email" style="color:red; margin-left:20px;" >You have previously sent a message that the admin has not yet read.</li>
                                        </ul>
                                        <!--error msg show-->
                                      





                                        <div class="col-sm-12 text-left">
                                            <button type="submit" class="pill-button-01" id="submit-btn">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--   Contact End   -->        

</div>
    
</template>

<script>
    export default {
        data () {
            return {
                form: new Form({
                    id:'',
                    f_name: '',
                    l_name: '',
                    email: '',
                    mobile: '',
                    msg: '',
                }),
                
                id:1,
                data_list:[],
                feedbacks: [],
                

            }
        },

        methods:{
            save() {
                this.form.post('/api/contact-msg-api')
                    .then((response)=>{
                        toastSuccess.fire({
                            icon: 'success',
                            title: 'Message Submit Successfully'
                        })
                        

                    })
                    .catch((error)=>{
                         //this.errors= error.response
                        // this.errors=error.response;
                        // if(error.response.data.errors.email[0]){
                        //     this.emailError="You have previously sent a message that the admin has not yet read"
                        // }
                       
                        this.feedbacks = error.response.data.errors;
                        console.log(this.feedbacks.f_name[0]);
                        
                    })
            },

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

                axios.get('/api/about-personalinfo-api/'+this.id)
                    .then(response => {
                        this.data_list=response.data;
                        loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },

        },

        mounted() {
            this.getData();
            console.log('Component mounted.')

             
        }
    }
</script>