<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Services</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="save">
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
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                }),

                editorConfig: {
                   
                },

            }
        },

        methods:{
            save() {
                this.form.post('/api/services-api')
                    .then((response)=>{
                      
                        this.$router.push('/services-page');
                        toastSuccess.fire({
                            icon: 'success',
                            title: 'Data add successfully'
                        })
                        

                    })
                    .catch(()=>{
                    })
            },

        },

        mounted() {
            console.log('Component mounted.')

             
        }
    }
</script>