<template>

<div>

    <section class="content">
         <div class="row"  >
             <div class="col-md-10" style="margin:auto;">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Portfolio Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
                <dt>Portfolio Images:</dt>
                <img :src="data_list.images" style="max-height:50px; max-width:150px; margin-bottom:10px;"/>

                <dt>Banner:</dt>
                <img :src="data_list.banner" style="max-height:50px; max-width:150px; margin-bottom:10px;"/>
            
                <dt>Category: <small>{{data_list.category_name}}</small></dt><br>
                <dt>Title: <small>{{data_list.title}}</small></dt><br>
                <dt>Details: <br> <small v-html="data_list.desc"></small></dt><br>
                    
                <dt>Url: <small>{{data_list.url}}</small></dt><br>

                <dt v-if="data_list.status=='Published'" style="margin-bottom:10px;">Status: <small><span style="background:#C8EFD4">{{data_list.status}}</span></small></dt>
                <dt v-else style="margin-bottom:10px;">Status:  <small><span style="background:#FBCFD0">{{data_list.status}}</span></small></dt>
                <dt>Created: <small>{{data_list.created_at | mydate}}</small></dt>
                
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

                axios.get('/api/portfolio-api/'+this.id)
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