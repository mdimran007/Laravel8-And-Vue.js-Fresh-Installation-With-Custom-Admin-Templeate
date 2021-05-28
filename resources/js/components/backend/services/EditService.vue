<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Services</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">
              <div class="box-body">
                <div class="form-group">
                  <label for="ServiceIcon">Service Icon <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="ServiceIcon" placeholder="" v-model="form.service_icon" name="service_icon" required>
                  <has-error :form="form" style="color:red;" field="service_icon"></has-error>
                </div>

                 <div class="form-group">
                  <label for="ServiceTitle">Service Title <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="ServiceTitle" placeholder="" v-model="form.service_title" name="service_title" required>
                 <has-error :form="form" style="color:red;" field="service_title"></has-error>
                </div>

                <div class="form-group">
                  <label for="Description">Description <span style="font-size:18px; color:red;">*</span></label>
                 <ckeditor  v-model="form.service_description" :config="editorConfig" id="Description"  name="service_description"></ckeditor>
                 <has-error :form="form" style="color:red;" field="service_description"></has-error>
                </div>


                <div class="form-group">
                    <label for="CategoryName">Status<span style="font-size:18px; color:red;">*</span></label>
                  <div class="radio">
                    <label>
                      <input type="radio"  id="optionsRadios1" v-model="form.status" value="Published" name="status"   checked>
                     Published
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="optionsRadios2" value="Unpublished" v-model="form.status" name="status">
                      Unpublished
                    </label>
                  </div>
                   <has-error :form="form" style="color:red;" field="status"></has-error>
                 
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
                    service_icon: '',
                    service_title: '',
                    service_description: '',
                    status: '',
                    
                }),

                id:this.$route.params.id,

                editorConfig: {
                   
                },

            }
        },

        methods:{
            update() {
                this.form.put('/api/services-api/'+this.id)
                    .then((response)=>{

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

             getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('/api/services-api/'+this.id)
                    .then(response => {
                        this.form.fill(response.data)
                        loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },


        },

       
        mounted() {
            console.log('Component mounted.'),
            this.getUpdateData();
             
        }
    }
</script>