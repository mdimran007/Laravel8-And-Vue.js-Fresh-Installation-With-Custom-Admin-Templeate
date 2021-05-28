<template>

<div>

    <section class="content">
         <div class="row"  >
             <div class="col-md-10" style="margin:auto;">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Service Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
             
                <dt style="margin-bottom:10px;"><i :class="'fa '+data_list.service_icon+' fa-lg'" style="margin-right:10px;"></i> {{data_list.service_title}}</dt>
                <dd style="margin-bottom:10px;" v-html="data_list.service_description"></dd>

                <dt v-if="data_list.status=='Published'" style="margin-bottom:10px;">Status: <span style="background:#C8EFD4">{{data_list.status}}</span></dt>
                 <dt v-else style="margin-bottom:10px;">Status:  <span style="background:#FBCFD0">{{data_list.status}}</span></dt>

                <dt>Created: {{data_list.created_at | mydate}}</dt>
                
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
         </div>
     </section>
              
</div>
    
</template>

<script>

    export default {
      data () {
            return {
              data_list:[],
              id:this.$route.params.id,
            }
        },

         methods:{
            
            getAlldata() {

                let loader = this.$loading.show();  

                axios.get('/api/services-api/'+this.id)
                    .then(response => {
                        this.data_list=response.data
                        loader.hide();
                    })
            },

           
        },

        mounted() {
            console.log('Component mounted.'),

            this.getAlldata();
        }
    }
</script>