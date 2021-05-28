<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Home Page Info</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">

             

              <div class="box-body">

                 <p v-if="errors.length" >
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors" style="color:red;">{{ error }}</li>
                  </ul>
                </p>

                <div class="form-group">
                <label for="Picture">Picture <span style="font-size:18px; color:red;">*</span></label>
                <br>

                <img :src="form.images" style="height:100px; margin-bottom:10px;"/>


                 
                 
                 <input type="file" accept="image/*" class="form-control" id="Picture"  name="images" v-on:change="onImageChange" />
                 <has-error :form="form" style="color:red;" field="images"></has-error>
                
                
                
                </div>

                <div class="form-group">
                  <label for="FullName">Full Name <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="FullName" placeholder="Full Name" v-model="form.full_name" name="full_name" required>
                  <has-error :form="form" style="color:red;" field="full_name"></has-error>
                </div>

                 <div class="form-group">
                  <label for="WorkTitle">Work Title <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="WorkTitle"  v-model="form.work_title" name="work_title" required>
                 <has-error :form="form" style="color:red;" field="work_title"></has-error>
                </div>

                <div class="form-group">
                  <label for="Details">Details </label>
                 <textarea class="form-control" id="Details" v-model="form.details" name="details" ></textarea>
                 <has-error :form="form" style="color:red;" field="details"></has-error>
                </div>

                <div class="form-group">
                  <label for="CV">CV Document </label>

                  
                   <span><img v-if="form.cv_doc" :src="'http://127.0.0.1:8000/files/file.png'" style="height:100px; margin-bottom:10px;"/>
                 <button v-if="form.cv_doc" v-show="editmode" class="btn btn-danger btn-sm" v-on:click="imageDlete"><i class="fa fa-close"/></button></span><br><br>

                 <input type="file" class="form-control" id="CV"  name="cv_doc" @change="cvDocOnChange" />
                 <has-error :form="form" style="color:red;" field="cv_doc"></has-error>
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

        data () {
            return {
                form: new Form({
                    id:'',
                    images:'',
                    full_name: '',
                    work_title: '',
                    details: '',
                    cv_doc: '',

            
                }),
                
                id:1,
                errors: [],
                editmode:true,


            }
        },

        methods:{

          imageDlete() {
            this.form.cv_doc = "";
            this.editmode=false;
          },

            onImageChange(e) {

                    var file = e.target.files[0];
                    var filetype =file.type;
                    const reader =new FileReader();
                    this.errors = [];

                        if((filetype=="image/jpeg") || (filetype=="image/png")) {

                          reader.onload = ()=>{
                              this.form.images = reader.result
                            }
                        }
                        else{
                            this.errors.push('The Image must be a file of type: JPG or PNG.');
                        }

                      reader.readAsDataURL(file);

            },

            cvDocOnChange(e) {

                    var file = e.target.files[0];
                    var filetype =file.type;
                    console.log(filetype);
                    const reader =new FileReader();
                    this.errors = [];

                     if((filetype=="application/pdf") || (filetype=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")) {

                          reader.onload = ()=>{
                              this.form.cv_doc = reader.result
                            }
                        }
                        else{
                            this.errors.push('The file must be a file of type: PDF or DOC.');
                        }


                    reader.readAsDataURL(file);
                   
            },

            getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('/api/home-api/'+this.id)
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
                this.form.put('/api/home-api/'+this.id)
                    .then((response)=>{

                        //this.$router.push('/home-page');
                        this.getUpdateData();
                        toastSuccess.fire({
                            icon: 'success',
                            title: 'Data update successfully'
                        })

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