<?php $this->load->view('common/admin/head');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/zabuto_calendar.css">
<script src="<?php echo base_url();?>assets/js/Chart.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<style type="text/css">
  .label-white {
    color: white;
  }
</style>
</head>
<body>
	<section id="container">
		<?php $this->load->view('common/admin/navbar');?>

		<?php $this->load->view('common/admin/sidebar');?>

		<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Posts</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4><a href="<?=base_url()?>admin/newPost" class="btn btn-theme"><i class="fa fa-plus"></i> Nuevo</a>
                  <form class="pull-right" id="formSystem" action="<?=base_url()?>admin/posts" method="post">
                    <div class="input-group">
                      <?php $search = $this->session->userdata('search_post'); if(!$search) $search=""?>
                      <div class="input-group-prepend">                        
                        <input class="form-control" id="system-search" name="search" placeholder="buscar nombre o raiz " value="<?=$search?>">                        
                      </div>
                      <button class="btn btn-info search">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped text-center">
                    <thead class="cf">
                      <tr>
                  
                        <th>Titulo</th>
                        <th class="numeric">Fecha</th>
                        <th class="numeric">Estado</th>
                        <th class="numeric">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (count($posts)>0) {
                        foreach ($posts as $k_t => $v_t) { ?>
                      <tr>
                        <td data-title="Raiz"><?=$v_t->titulo?></td>
                        <td class="numeric" data-title="Registro"><?=$v_t->fecha?></td>
                        <td class="numeric" data-title="Estado"><?php $st = ($v_t->estado == '1')?"Activo" :"Inactivo"; echo $st ?></td>
                        <td class="numeric d-flex justify-content-around" data-title="Acción">
                          <a href="<?=base_url()?>admin/update_post/<?=$v_t->id?>" class="btn btn-warning"><i class="fa fa-user"></i></a>
                         <button class="btn btn-danger btn-sm" onclick="delete_post(<?=$v_t->id?>)"><i class="fa fa-trash-o"></i></button>
                         <!-- <a href="<?=base_url()?>admin/delete_post/<?=$v_t->id?>" class="btn btn-warning"><i class="fa fa-trash-o"></i></a>-->
                        </td>
                      </tr>
                        <?php }
                      } ?>
                      
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center">
                  <nav aria-label="Page navigation">
                    <?=$this->pagination->create_links(); ?>
                  </nav>
                </div>
              </div>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->

    <?php $this->load->view('common/admin/footer');?>


	</section>
	<?php $this->load->view('common/admin/js');?>

  <script src="<?php echo base_url(); ?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url(); ?>assets/lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo base_url(); ?>assets/lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/zabuto_calendar.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="application/javascript">
    
    function delete_post(id){
      var opcion = confirm("Desea eliminar el post");
      if(opcion)
      {
        ajax('servicios/delete_post',
          {
            id:id
          },function(data){
            if(data.res =="ok"){
              Swal.fire({ icon: 'success', title: 'Se elimino el post.', showConfirmButton: false, timer: 1500 })
              setTimeout(function() {
              window.location.href=base_url+"admin/posts";
              }, 1500);
            }else{
              Swal.fire({ icon: 'error', title: 'Oops...', text: 'Fallido'})
            
            }

          },1000)
      }
      

    }
    

  </script>
</body>