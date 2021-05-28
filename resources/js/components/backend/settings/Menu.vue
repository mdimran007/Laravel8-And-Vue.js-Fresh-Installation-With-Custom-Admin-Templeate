<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Menu Activation</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">

             

              <div class="box-body">


          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.home" id="Home" >
            <label class="form-check-label" for="Home">
              Home
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.about" id="About">
            <label class="form-check-label" for="About">
              About
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.services" id="Service" >
            <label class="form-check-label" for="Service">
              Service
            </label>
          </div>


          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.portfolio" id="Portfolio" >
            <label class="form-check-label" for="Portfolio">
              Portfolio
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.videos" id="Videos" >
            <label class="form-check-label" for="Videos">
              Videos
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.blog" id="Blog" >
            <label class="form-check-label" for="Blog">
              Blog
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" v-model="form.contact" id="Contact">
            <label class="form-check-label" for="Contact">
              Contact
            </label>
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
                    home:'',
                    about:'',
                    services:'',
                    portfolio:'',
                    videos:'',
                    blog:'',
                    contact:'',
                
            
                }),
                
                id:1,


            }
        },

        methods:{

                     
            getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('/api/menu-api/'+this.id)
                    .then(response => {
                        this.form.fill(response.data)
                        console.log(this.form.services);
                        loader.hide();
                    })
                    .catch(function (error) {
                        console.log(error);
                        loader.hide();
                    })
            },
           
            update() {
                this.form.put('api/menu-api/'+this.id)
                    .then((response)=>{

                        //this.$router.push('/menu-setting');
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