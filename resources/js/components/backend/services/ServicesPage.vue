<template>

<div>
     <section class="content-header">
      <h1>
        Services List
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data List</h3><span style="float:right;"><router-link to="/add-new-services" class="btn btn-primary">Add New</router-link></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Service Icon</th>
                  <th>Service Title</th>
                  <th>Description</th>
                  <th>Create At</th>
                  <th>Update At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="service,index in data_list">
                  <td>{{index+1}}</td>
                  <td> <i :class="'fa-lg fa '+service.service_icon"></i></td>
                  <td>{{service.service_title}}</td>
                  <td>
                    <read-more more-str="Details" :text="service.service_description" link="#" less-str="read less" :max-chars="79"></read-more>
                    </td>
                  <td>{{service.created_at | mydate}}</td>
                  <td>
                    <span v-if="service.status=='Published'" style="background:#C8EFD4;"> {{service.status}}</span>
                    <span v-else style="background:#FBCFD0;"> {{service.status}}</span>
                  </td>
                  
                  <td>
                    <router-link :to="'view-service/'+service.id" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></router-link>
                    <router-link :to="'edit-service/'+service.id" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></router-link>
                    <button @click="deleteDistrict(service.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
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

                axios.get('api/services-api-new')
                    .then(response => {
                        this.data_list=response.data
                        loader.hide();
                    })
            },


            deleteDistrict(id) {

              axios.delete('api/services-api/'+id)
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