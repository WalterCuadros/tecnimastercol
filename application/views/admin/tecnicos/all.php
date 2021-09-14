<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Técnicos</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4><a href="<?=base_url()?>admin/newTecnico" class="btn btn-theme"><i class="fa fa-plus"></i> Nuevo</a>
                  <form class="pull-right" id="formSystem" action="<?=base_url()?>admin/tecnicos" method="post">
                    <div class="input-group">
                      <?php $search = $this->session->userdata('search_tecnicos'); if(!$search) $search=""?>
                      <div class="input-group-prepend">                        
                        <input class="form-control" id="system-search" name="search" placeholder="Buscar por nombre o email" value="<?=$search?>">                        
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
                        <th>ID</th>
                        <th>Cédula</th>
                        <th class="numeric">Nombres</th>
                        <th class="numeric">Municipio</th>
                        <th class="numeric">Email</th>
                        <th class="numeric">Contacto</th>
                        <th class="numeric">Total servicios</th>
                        <th class="numeric">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($tecnicos)>0) {
                        foreach ($tecnicos as $k_t => $v_t) { ?>
                      <tr>
                        <td data-title="ID"><?=$v_t->id?></td>
                        <td data-title="Cédula"><?=$v_t->cedula?></td>
                        <td class="numeric" data-title="Nombres"><?=$v_t->nombres.' '.$v_t->apellidos?></td>
                        <td class="numeric" data-title="Municipio"><?=$v_t->municipio.'<br>'.$v_t->direccion?></td>
                        <td class="numeric" data-title="Email"><?=$v_t->email?></td>
                        <td class="numeric" data-title="Contacto"><?=$v_t->contacto?></td>
                        <td class="numeric" data-title="Total servicios"><?=$v_t->total?></td>
                        <td class="numeric d-flex justify-content-around" data-title="Acción">
                          <a href="<?=base_url()?>admin/viewTecnico/<?=$v_t->id?>" class="btn btn-warning"><i class="fa fa-user"></i></a>
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
  </body>
</html>