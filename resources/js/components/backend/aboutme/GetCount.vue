<template>

       <div>

               <section class="content">
      <div class="row">

        <div class="col-md-6" style="margin:auto;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About- Get Count</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="update">

             

              <div class="box-body">

               
                <div class="form-group">
                  <label for="GetAward">Get Award </label>
                  <input type="number" class="form-control" id="GetAward"  v-model="form.get_award" name="get_award" >
                  <has-error :form="form" style="color:red;" field="get_award"></has-error>
                </div>

                 <div class="form-group">
                  <label for="ResearchPaper">Research Paper </label>
                  <input type="number" class="form-control" id="ResearchPaper"  v-model="form.research_paper" name="research_paper" >
                 <has-error :form="form" style="color:red;" field="research_paper"></has-error>
                </div>

                <div class="form-group">
                  <label for="ProjectDone">Project Done </label>
                  <input type="number" class="form-control" id="ProjectDone"  v-model="form.project_done" name="project_done" >
                 <has-error :form="form" style="color:red;" field="project_done"></has-error>
                </div>

                <div class="form-group">
                  <label for="HappyClients">Happy Clients</label>
                  <input type="number" class="form-control" id="HappyClients"  v-model="form.happy_clients" name="happy_clients" >
                 <has-error :form="form" style="color:red;" field="happy_clients"></has-error>
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
                    get_award: '',
                    research_paper: '',
                    project_done: '',
                    happy_clients: '',
                                
                }),
                
                id:1,

            }
        },

        methods:{

            
            getUpdateData() {

              let loader = this.$loading.show();  

                axios.get('/api/about-getcount-api/'+this.id)
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
                this.form.put('/api/about-getcount-api/'+this.id)
                    .then((response)=>{

                        this.$router.push('/get-count');
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