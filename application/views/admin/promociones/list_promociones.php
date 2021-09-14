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
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Promociones</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4><a href="<?=base_url()?>admin/newPromocion" class="btn btn-theme"><i class="fa fa-plus"></i> Nuevo</a>
                  <form class="pull-right" id="formSystem" action="<?=base_url()?>admin/promociones" method="post">
                    <div class="input-group">
                      <?php $search = $this->session->userdata('search'); if(!$search) $search=""?>
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
                        <th>Raiz</th>
                        <th>Nombre promoción </th>
                        <th class="numeric">Contenido</th>
                        <th class="numeric">Fecha de registro</th>
                        <th class="numeric">Fecha inicio</th>
                        <th class="numeric">Fecha fin</th>
                        <th class="numeric">Estado</th>
                        <th class="numeric">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (count($promociones)>0) {
                        foreach ($promociones as $k_t => $v_t) { ?>
                      <tr>
                        <td data-title="Raiz"><?=$v_t->raiz?></td>
                        <td data-title="Nombre"><?=$v_t->nombre_promocion?></td>
                        <td class="numeric" data-title="Contenidp"><?=$v_t->cabecera?></td>
                        <td class="numeric" data-title="Registro"><?=$v_t->fecha_registro?></td>
                        <td class="numeric" data-title="Fecha_inicio"><?=$v_t->fecha_inicio?></td>
                        <td class="numeric" data-title="Fecha_fin"><?=$v_t->fecha_fin?></td>
                        <td class="numeric" data-title="Estado"><?php $st = ($v_t->estado == '1')?"Activo" :"Inactivo"; echo $st ?></td>
                        <td class="numeric d-flex justify-content-around" data-title="Acción">
                          <a href="<?=base_url()?>admin/update_promocion/<?=$v_t->id?>" class="btn btn-warning"><i class="fa fa-user"></i></a>
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
    
    

  </script>
</body>