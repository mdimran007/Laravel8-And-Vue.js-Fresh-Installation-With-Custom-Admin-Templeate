<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Portfolio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">

                <!-- <p v-if="errors.length" >
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors" style="color:red;">{{ error }}</li>
                  </ul>
                </p> -->

              <div class="box-body">

                  <div class="form-group">
                  <label for="Category">Category <span style="font-size:18px; color:red;">*</span></label>
                  <select class="form-control" id="Category"  v-model="form.category_name" name="category_name">
                        <option v-for="category,index in category_list" :value="category.category_name">{{category.category_name}}</option>
                       
                  </select>
                  <has-error :form="form" style="color:red;" field="category_name"></has-error>
                </div>


                <div class="form-group">
                  <label for="Title">Title <span style="font-size:18px; color:red;">*</span></label>
                  <input type="text" class="form-control" id="Title" placeholder="" v-model="form.title" name="title" required>
                  <has-error :form="form" style="color:red;" field="title"></has-error>
                </div>

                <div class="form-group">
                  <label for="Description">Description </label>
                  
                   <ckeditor v-model="form.desc" :config="editorConfig" id="Description"  name="desc"></ckeditor>
                  
                  <has-error :form="form" style="color:red;" field="desc"></has-error>
                </div>

                <div class="form-group">
                  <label for="URL">URL</label>
                  <input type="text" class="form-control" id="URL" placeholder="" v-model="form.url" name="url" >
                  <has-error :form="form" style="color:red;" field="url"></has-error>
                </div>

                <div class="form-group">
                <label for="Picture">Picture <span style="font-size:18px; color:red;">*</span></label>
                <br>
                <img :src="form.images" style="max-height:100px; margin-bottom:10px;"/>
                 <input type="file" accept="image/*" class="form-control" id="Picture"  name="images" v-on:change="onImageChange" />
                 <has-error :form="form" style="color:red;" field="images"></has-error>
                </div>

                <div class="form-group">
                <label for="Banner">Banner </label>
                <br>
                <img :src="form.banner" style="max-height:50px; max-width:150px; margin-bottom:10px;"/>
                                  <button v-if="form.banner" v-show="editmode" class="btn btn-danger btn-sm" style="margin-bottom:10px;"  v-on:click="bannerDlete"><i class="fa fa-close"/></button>
                 <input type="file" accept="image/*" class="form-control" id="Banner"  name="banner" v-on:change="onBannerChange" />
                 <has-error :form="form" style="color:red;" field="banner"></has-error>

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
                    images:'',
                    banner:'',
                    title:'',
                    desc:'',
                    url:'',
                    status: '',

                }),

                category_list:[],
                id:this.$route.params.id,
                editmode:true,

                editorConfig: {
                   
                },

            }
        },

        methods:{
            bannerDlete() {
            this.form.banner = "";
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

            onBannerChange(e) {

                    var file = e.target.files[0];
                    var filetype =file.type;
                    const reader =new FileReader();
                    this.errors = [];

                        if((filetype=="image/jpeg") || (filetype=="image/png")) {

                          reader.onload = ()=>{
                              this.form.banner = reader.result
                            }
                        }
                        else{
                            this.errors.push('The Image must be a file of type: JPG or PNG.');
                        }

                      reader.readAsDataURL(file);

            },

            getAllCategory() {

                let loader = this.$loading.show();  

                axios.get('/api/portfolio-category-api')
                    .then(response => {
                        this.category_list=response.data
                        loader.hide();
                    })
            },

            getAllProtfolio() {

                let loader = this.$loading.show();  

                axios.get('/api/portfolio-api/'+this.id)
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
                this.form.put('/api/portfolio-api/'+this.id)
                    .then((response)=>{

                        this.getAllCategory();
                        this.getAllProtfolio();
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
           
             this.getAllCategory();
             this.getAllProtfolio();


             
        }
    }
</script>