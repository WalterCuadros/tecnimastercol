<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Solicitudes</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4>Solicitudes</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped text-center">
                    <thead class="cf">
                      <tr>
                        <th>ID</th>
                        <th>Aparato</th>
                        <th>Marca aparato</th>
                        <th>Servicio</th>
                        <th>Contacto</th>
                        <th>Email</th>
                        <th>Clave</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($solicitudes)>0) {
                        foreach ($solicitudes as $k_t => $v_t) { ?>
                      <tr>
                        <td data-title="ID"><?=$v_t->id_solicitud_servicio?></td>
                        <td data-title="Aparato"><?=$v_t->tipo_aparato?></td>
                        <td data-title="Marca aparato"><?=$v_t->marca_aparato?></td>
                        <td data-title="Servicio"><?=$v_t->tipo_servicio?></td>
                        <td data-title="Contacto"><?=$v_t->numero_contacto?></td>
                        <td data-title="Email"><?=$v_t->email?></td>
                        <td data-title="Clave"><?=$v_t->clave_servicio?></td>
                        <td class="d-flex justify-content-around" data-title="Acción">
                          <button class="btn btn-warning delete" onclick="deleteSolicitud('<?=$v_t->id_solicitud_servicio?>')"><i class="fa fa-trash"></i></button>
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

  <script type="text/javascript">
    function deleteSolicitud(id_solicitud){
      ajax('servicios/deleteSolicitud',
      {  
        id_solicitud:id_solicitud
      },
      function(data){
        if(data.res=="ok"){
          Swal.fire({ icon: 'success', title: 'Se ha eliminado el registro.', showConfirmButton: false, timer: 1500 })
          setTimeout(function() {
            location.reload();
          }, 1500);          
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      },10000);
    }
  </script>
  </body>
</html>