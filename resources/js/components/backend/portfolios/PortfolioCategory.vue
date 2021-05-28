<template>

<div>
     <section class="content-header">
      <h1>
        Protfolio Category List
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data List</h3><span style="float:right;"><router-link to="/add-portfolio-category" class="btn btn-primary">Add New</router-link></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Category_Name</th>
                  <th>Status</th>
                  <th>Create At</th>
                  <th>Update At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="portfolio,index in data_list">
                  <td>{{index+1}}</td>
                  <td>{{portfolio.category_name}}</td>
                  <td>{{portfolio.status}}</td>
                  <td>{{portfolio.created_at | mydate}}</td>
                  <td>{{portfolio.updated_at | mydate}}</td>
                  <td>
                    
                    <router-link :to="'portfolio-category-update/'+portfolio.id" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></router-link>
                    <button @click="deleteData(portfolio.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                  </td>
                </tr>
               
          
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
    
</template>

<script>
    export default {

      data () {
            return {
              data_list:[],
            }
        },

         methods:{
            
            getAlldata() {

                let loader = this.$loading.show();  

                axios.get('api/portfolio-category-api-new')
                    .then(response => {
                        this.data_list=response.data
                        loader.hide();
                    })
            },


            deleteData(id) {

              axios.delete('api/portfolio-category-api/'+id)
                    .then(response => {
                        this.getAlldata();
                        toastSuccess.fire({
                            icon: 'success',
                            title: 'Delete successfully'
                        })

                    })

            },
           
        },

        mounted() {
            console.log('Component mounted.'),

            this.getAlldata();

             $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
        }
    }
</script>