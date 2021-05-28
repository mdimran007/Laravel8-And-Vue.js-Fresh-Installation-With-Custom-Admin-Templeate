<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Logo</h3>
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
                <label for="Picture">Image <span style="font-size:18px; color:red;">*</span></label>
                <br>

                <img :src="form.logo_image" style="height:100px; margin-bottom:10px;"/>

                 
                 <input type="file" accept="image/*" class="form-control" id="Picture"  name="logo_image" v-on:change="onLogoChange" />
                 <has-error :form="form" style="color:red;" field="logo_image"></has-error>
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

  name: "Logo",
        data () {
            return {
                form: new Form({
                    id:'',
                    logo_image:'',
            
                }),
                
                id:1,
                errors: [],


            }
        },

        methods:{

            onLogoChange(e) {

                    var file = e.target.files[0];
                    var filetype =file.type;
                    const reader =new FileReader();
                    this.errors = [];

                        if((filetype=="image/jpeg") || (filetype=="image/png")) {

                          reader.onload = ()=>{
                              this.form.logo_image = reader.result
                              //console.log(this.form.logo_image);
                            }
                        }
                        else{
                            this.errors.push('The Image must be a file of type: JPG or PNG.');
                        }

                      reader.readAsDataURL(file);

            },

           
            getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('api/logo-api/'+this.id)
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
                this.form.put('api/logo-api/'+this.id)
                    .then((response)=>{

                        //this.$router.push('/logo-setting');
                        this.getUpdateData();
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