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
        <div class="row">
          <div class="col-lg-12 px-4">
            
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><i class="fa fa-users"></i> CLIENTES</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#FF6B6B"
                      },
                      {
                        value: 30,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Total:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2><i class="fa fa-plus"></i> <?=$total_clientes?></h2>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn donut-chart">
                  <div class="darkblue-header">
                    <h5><i class="fa fa-briefcase"></i> Contador visitas</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p class="label-white">Total:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2><i class="fa fa-plus"></i> <?=$visitas[0]->cont?></h2>
                    </div>
                  </div>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><i class="fa fa-dollar"></i> Servicios</h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[<?=join(',', $total_servicios)?>]"></div>
                  </div>
                  <p class="mt"><b>$<?=$total_ganancias[0]->valor?></b><br/>Mes actual</p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>

            <div class="row mt">
              <div class="border-head">
                <h3>Servicios</h3>
              </div>
              <div class="col-12">
                <div class="card h-100">
                  <div class="card-header d-flex justify-content-start align-items-center">
                    <div class="form-group">
                      <label>Fecha inicio</label>
                      <input name="fecha_in_servicios" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <label>Fecha fin</label>
                      <input name="fecha_fin_servicios" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <label>Nombre cliente</label>
                      <input name="nombre_cliente_servicios" class="form-control" placeholder="Nombre cliente">
                    </div>
                    <div class="form-group pl-3">
                      <label>Nombre técnico</label>
                      <input name="nombre_tecnico_servicios" class="form-control" placeholder="Nombre técnico">
                    </div>
                    <div class="form-group pl-3">
                      <label>Orden servicio</label>
                      <input name="orden_servicios" class="form-control" placeholder="Orden servicio">
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-primary" id="buscar-servicios"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-danger" id="delete-servicios"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="card-body table-responsive" id="contenedor-servicios">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt">
              <div class="border-head">
                <h3>Servicios por tecnicos</h3>
              </div>
              <div class="col-12">
                <div class="card h-100">
                  <div class="card-header d-flex justify-content-start align-items-center">
                    <div class="form-group">
                      <label>Fecha inicio</label>
                      <input name="fecha_in_tecnicos" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <label>Fecha fin</label>
                      <input name="fecha_fin_tecnicos" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-primary" id="buscar-tecnicos"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-danger" id="delete-tecnicos"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="card-body table-responsive" id="contenedor-tecnicos">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt">
              <div class="border-head">
                <h3>Servicios por clientes</h3>
              </div>
              <div class="col-12">
                <div class="card h-100">
                  <div class="card-header d-flex justify-content-start align-items-center">
                    <div class="form-group">
                      <label>Fecha inicio</label>
                      <input name="fecha_in_clientes" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <label>Fecha fin</label>
                      <input name="fecha_fin_clientes" class="form-control fecha" placeholder="DD-MMM-YYYY">
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-primary" id="buscar-clientes"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="form-group pl-3">
                      <button class="btn btn-danger" id="delete-clientes"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                  <div class="card-body table-responsive" id="contenedor-clientes">
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
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
    
    $(function () {
      $('.fecha').datetimepicker({
        format: 'L',
        maxDate: moment().format('DD-MMM-YYYY'),
        locale: 'es'
      });

      $('[name=fecha_in_tecnicos]').val('')
      $('[name=fecha_fin_tecnicos]').val('')
      $('[name=fecha_in_clientes]').val('')
      $('[name=fecha_fin_clientes]').val('')
      $('[name=fecha_in_servicios]').val('')
      $('[name=fecha_fin_servicios]').val('')
    });

    $("#contenedor-servicios").load("paginationServicios", {
      'fecha_in': $('[name=fecha_in_servicios]').val(),
      'fecha_fin': $('[name=fecha_fin_servicios]').val(),
      'nombre_cliente': $('[name=nombre_cliente_servicios]').val(),
      'nombre_tecnico': $('[name=nombre_tecnico_servicios]').val(),
      'orden_servicios': $('[name=orden_servicios]').val()
    });

    $(document).on("click", "#pagination-digg_servicios a", function(e){
      e.preventDefault();
      var href = $(this).attr("href");
      $("#contenedor-servicios").load(href, {
        'fecha_in': $('[name=fecha_in_servicios]').val(),
        'fecha_fin': $('[name=fecha_fin_servicios]').val(),
        'nombre_cliente': $('[name=nombre_cliente_servicios]').val(),
        'nombre_tecnico': $('[name=nombre_tecnico_servicios]').val(),
        'orden_servicios': $('[name=orden_servicios]').val()
      })
    });

    $('#buscar-servicios').on('click', function () {
      if ( ($('[name=fecha_in_servicios]').val()!='' && $('[name=fecha_fin_servicios]').val()=='') || ($('[name=fecha_in_servicios]').val()=='' && $('[name=fecha_fin_servicios]').val()!='') ) {
        return Swal.fire( { icon: 'error', title: 'Oops...', text: 'Debe agregar una fecha inicio y fecha fin' } )
      }else{
        $("#contenedor-servicios").load("paginationServicios", {
          'fecha_in': $('[name=fecha_in_servicios]').val(),
          'fecha_fin': $('[name=fecha_fin_servicios]').val(),
          'nombre_cliente': $('[name=nombre_cliente_servicios]').val(),
          'nombre_tecnico': $('[name=nombre_tecnico_servicios]').val(),
          'orden_servicios': $('[name=orden_servicios]').val()
        })
      }
    })


    $("#contenedor-tecnicos").load("paginationTecnicosServicios", {
      'fecha_in': $('[name=fecha_in_tecnicos]').val(),
      'fecha_fin': $('[name=fecha_fin_tecnicos]').val()
    });

    $(document).on("click", "#pagination-digg1 a", function(e){
      e.preventDefault();
      var href = $(this).attr("href");
      $("#contenedor-tecnicos").load(href, {
        'fecha_in': $('[name=fecha_in_tecnicos]').val(),
        'fecha_fin': $('[name=fecha_fin_tecnicos]').val()
      })
    });

    $('#buscar-tecnicos').on('click', function () {
      if ($('[name=fecha_in_tecnicos]').val()!='' && $('[name=fecha_fin_tecnicos]').val()!='') {
      $("#contenedor-tecnicos").load("paginationTecnicosServicios", {
        'fecha_in': $('[name=fecha_in_tecnicos]').val(),
        'fecha_fin': $('[name=fecha_fin_tecnicos]').val()
      })
      }else{
        return Swal.fire( { icon: 'error', title: 'Oops...', text: 'Debe agregar una fecha inicio y fecha fin' } )
      }
    })


    $("#contenedor-clientes").load("paginationClientesServicios", {
      'fecha_in': $('[name=fecha_in_clientes]').val(),
      'fecha_fin': $('[name=fecha_fin_clientes]').val()
    });

    $(document).on("click", "#pagination-digg a", function(e){
     e.preventDefault();
      var href = $(this).attr("href");
      $("#contenedor-clientes").load(href, {
        'fecha_in': $('[name=fecha_in_clientes]').val(),
        'fecha_fin': $('[name=fecha_fin_clientes]').val()
      })
    });


    $('#buscar-clientes').on('click', function () {
      if ($('[name=fecha_in_clientes]').val()!='' && $('[name=fecha_fin_clientes]').val()!='') {
      $("#contenedor-clientes").load("paginationClientesServicios", {
        'fecha_in': $('[name=fecha_in_clientes]').val(),
        'fecha_fin': $('[name=fecha_fin_clientes]').val()
      })
      }else{
        return Swal.fire( { icon: 'error', title: 'Oops...', text: 'Debe agregar una fecha inicio y fecha fin' } )
      }
    })

    $('#delete-servicios').on('click', function () {
      $('[name=fecha_in_servicios]').val('')
      $('[name=fecha_fin_servicios]').val('')

      $("#contenedor-servicios").load("paginationServicios", {
        'fecha_in': $('[name=fecha_in_servicios]').val(),
        'fecha_fin': $('[name=fecha_fin_servicios]').val()
      })
    })

    $('#delete-clientes').on('click', function () {
      $('[name=fecha_in_clientes]').val('')
      $('[name=fecha_fin_clientes]').val('')

      $("#contenedor-clientes").load("paginationClientesServicios", {
        'fecha_in': $('[name=fecha_in_clientes]').val(),
        'fecha_fin': $('[name=fecha_fin_clientes]').val()
      })
    })

    $('#delete-tecnicos').on('click', function () {
      $('[name=fecha_in_tecnicos]').val('')
      $('[name=fecha_fin_tecnicos]').val('')

      $("#contenedor-tecnicos").load("paginationTecnicosServicios", {
        'fecha_in': $('[name=fecha_in_tecnicos]').val(),
        'fecha_fin': $('[name=fecha_fin_tecnicos]').val()
      })
    })

  </script>
</body>