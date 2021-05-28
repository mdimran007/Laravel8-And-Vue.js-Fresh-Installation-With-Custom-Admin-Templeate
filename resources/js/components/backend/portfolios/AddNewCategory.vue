<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="save">
              <div class="box-body">

                <div class="form-group">
                  <label for="CategoryName">Category Name <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="CategoryName" placeholder="" v-model="form.category_name" name="category_name" required>
                  <has-error :form="form" style="color:red;" field="category_name"></has-error>
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
                    category_name: '',
                    status: '',

                }),

            }
        },

        methods:{
            save() {
                this.form.post('/api/portfolio-category-api')
                    .then((response)=>{
                      
                        this.$router.push('/portfolio-category');
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