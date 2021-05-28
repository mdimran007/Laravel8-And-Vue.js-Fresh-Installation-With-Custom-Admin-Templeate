<template>

<div>
     <section class="content-header">
      <h1>
        Inbox
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Msg List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Message</th>
                  <th>Create At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="msg,index in data_list">
                  <td>{{index+1}} 
                    <span v-if="msg.status=='Unread'" style=" margin-left:10px; background:#B21016; color:#fff; padding:4px; border-radius:10px;">New</span>
                    </td>
                  <td>{{msg.f_name}} {{msg.l_name}}</td>
                  <td>{{msg.email}}</td>
                  <td>{{msg.mobile}}</td>
                  <td>{{msg.msg}}</td>
                  <td>{{msg.created_at | mydate}}</td>
                  <td>
                    <router-link :to="'msg-view/'+msg.id" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></router-link>
                    <button @click="deleteDistrict(msg.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
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

                axios.get('api/contact-msg-api')
                    .then(response => {
                        this.data_list=response.data
                        loader.hide();
                    })
            },


            deleteDistrict(id) {

              axios.delete('api/contact-msg-api/'+id)
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