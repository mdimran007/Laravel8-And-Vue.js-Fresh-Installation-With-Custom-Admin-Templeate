<template>

<div>

    <section class="content">
         <div class="row"  >
             <div class="col-md-10" style="margin:auto;">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Message Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
             
                
                <dd style="margin-bottom:10px;">Name: {{data_list.f_name}} {{data_list.l_name}}</dd>
                <dd style="margin-bottom:10px;">Email: {{data_list.email}}</dd>
                <dd style="margin-bottom:10px;">Mobile: {{data_list.mobile}}</dd>
                <dd style="margin-bottom:10px;">Message: {{data_list.msg}} </dd>
                <dd>Submit Date: {{data_list.created_at | mydate}}</dd>
                
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

                axios.get('/api/contact-msg-api/'+this.id)
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