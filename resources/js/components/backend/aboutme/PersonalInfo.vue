<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About-Personal Info</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">

             

              <div class="box-body">

               
                <div class="form-group">
                  <label for="Name">Name </label>
                  <input type="text" class="form-control" id="Name" placeholder="Name" v-model="form.name" name="name" >
                  <has-error :form="form" style="color:red;" field="name"></has-error>
                </div>

                 <div class="form-group">
                  <label for="Title">Title </label>
                  <input type="text" class="form-control" id="Title"  v-model="form.title" name="title" >
                 <has-error :form="form" style="color:red;" field="title"></has-error>
                </div>

                <div class="form-group">
                  <label for="Degree">Degree </label>
                  <input type="text" class="form-control" id="Degree"  v-model="form.degree" name="degree" >
                 <has-error :form="form" style="color:red;" field="degree"></has-error>
                </div>

                <div class="form-group">
                  <label for="DOB">Date Of Birth</label>
                  <input type="date" class="form-control" id="DOB"  v-model="form.dob" name="dob" >
                 <has-error :form="form" style="color:red;" field="dob"></has-error>
                </div>

                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="text" class="form-control" id="Email"  v-model="form.email" name="email" >
                 <has-error :form="form" style="color:red;" field="email"></has-error>
                </div>

                <div class="form-group">
                  <label for="Mobile">Mobile</label>
                  <input type="text" class="form-control" id="Mobile"  v-model="form.mobile" name="mobile" >
                 <has-error :form="form" style="color:red;" field="mobile"></has-error>
                </div>

                <div class="form-group">
                  <label for="Skype">Skype</label>
                  <input type="text" class="form-control" id="Skype"  v-model="form.skype" name="skype" >
                 <has-error :form="form" style="color:red;" field="skype"></has-error>
                </div>

                <div class="form-group">
                  <label for="Whatsapp">Whatsapp</label>
                  <input type="text" class="form-control" id="Whatsapp"  v-model="form.whatsapp" name="whatsapp" >
                 <has-error :form="form" style="color:red;" field="whatsapp"></has-error>
                </div>

                <div class="form-group">
                  <label for="Location">Location</label>
                  <input type="text" class="form-control" id="Location"  v-model="form.location" name="location" >
                 <has-error :form="form" style="color:red;" field="location"></has-error>
                </div>

                <div class="form-group">
                  <label for="Freelance">Freelance </label>
                  <input type="text" class="form-control" id="Freelance"  v-model="form.freelance" name="freelance" >
                 <has-error :form="form" style="color:red;" field="freelance"></has-error>
                </div>

                <div class="form-group">
                  <label for="Facebook">Facebook <i class="fa fa-facebook text-primary"></i></label>
                  <input type="text" class="form-control" id="Facebook"  v-model="form.facebook" name="facebook" >
                 <has-error :form="form" style="color:red;" field="facebook"></has-error>
                </div>

                <div class="form-group">
                  <label for="Youtube">Youtube <i class="fa fa-youtube text-danger"></i></label>
                  <input type="text" class="form-control" id="Youtube"  v-model="form.youtube" name="youtube" >
                 <has-error :form="form" style="color:red;" field="youtube"></has-error>
                </div>

                <div class="form-group">
                  <label for="Linkedin">Linkedin <i class="fa fa-linkedin text-primary"></i></label>
                  <input type="text" class="form-control" id="Linkedin"  v-model="form.linkedin" name="linkedin">
                 <has-error :form="form" style="color:red;" field="linkedin"></has-error>
                </div>

                <div class="form-group">
                  <label for="Twitter">Twitter <i class="fa fa-twitter text-info"></i></label>
                  <input type="text" class="form-control" id="Twitter"  v-model="form.twitter" name="twitter" >
                 <has-error :form="form" style="color:red;" field="twitter"></has-error>
                </div>

                <div class="form-group">
                  <label for="Website">Website <i class="fa fa-globe text-primary"></i></label>
                  <input type="text" class="form-control" id="Website"  v-model="form.website" name="website" >
                 <has-error :form="form" style="color:red;" field="website"></has-error>
                </div>

         


               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>

      </div>

    </section>
       </div>
    
</template>

<script>

 export default {

  name: "HomePage",
        data () {
            return {
                form: new Form({
                    id:'',
                    name: '',
                    title: '',
                    degree: '',
                    dob: '',
                    email: '',
                    mobile: '',
                    skype: '',
                    whatsapp: '',
                    location: '',
                    freelance: '',
                    facebook: '',
                    youtube: '',
                    linkedin: '',
                    twitter: '',
                    website: '',
            
                }),
                
                id:1,

            }
        },

        methods:{

            
            getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('/api/about-personalinfo-api/'+this.id)
                    .then(response => {
                        this.form.fill(response.data)
                        loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },
           
            update() {
                this.form.put('/api/about-personalinfo-api/'+this.id)
                    .then((response)=>{

                        this.$router.push('/personal-info');
                        toastSuccess.fire({
                            icon: 'success',
                            title: 'Data update successfully'
                        })

                        
                        // console.log(response.data);

                    })
                     .catch(function (error) {
                        console.log(error);
                    })
                    
            },

        },

        mounted() {
            this.getUpdateData();
             
        },
      
    }
</script>