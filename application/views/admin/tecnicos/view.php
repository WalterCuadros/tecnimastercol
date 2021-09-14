<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-12">
            <a href="<?=base_url()?>admin/tecnicos" class="btn btn-info p-absolute t-15"><i class="fa fa-arrow-left"></i></a>
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?=$total_clientes?></h4>
                  <h6>Total Clientes</h6>
                  <h4><?=$total_servicios?></h4>
                  <h6>Total Servicios</h6>
                  <h4>$ <?=number_format($total_servicios_valor, 0, '', '.');?></h4>
                  <h6>GANANCIAS</h6>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?=$tecnico[0]->nombres." ".$tecnico[0]->apellidos?></h3>
                <h6>Técnico</h6>
                <p>Cédula: <?=$tecnico[0]->cedula?></p>
                <p>Celular: <?=$tecnico[0]->contacto?></p>
                <p>Email: <?=$tecnico[0]->email?></p>
                <p>Dirección:  <?=$tecnico[0]->municipio;?> - <?=$tecnico[0]->direccion;?></p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?=base_url()?>assets/img/<?=(!empty($tecnico[0]->foto_perfil))?'tecnicos/'.$tecnico[0]->foto_perfil:'default-avatar.png'?>" class="img-circle"></p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-12 mt">
            <div class="row card h-100">
              <div class="card-header w-100">
                <ul class="nav nav-pills nav-fill nav-justified" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" class="contact-map" role="tab" aria-controls="contact" aria-selected="true">Contacto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Editar Perfil</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="card-body w-100">
                <div class="tab-content" id="myTabContent">
                  <div id="overview" class="tab-pane fade show active" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <h4>Todos los servicios</h4>
                        <div id="contentServicios"></div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-12 col-lg-6 detailed">
                        <h4>Servicio</h4>
                        <div class="row centered mt mb">
                          <div class="col-sm-4">
                            <h1><i class="fa fa-money"></i></h1>
                            <h3 class="valor_servicio">$ 0</h3>
                            <h6>COSTO DEL SERVICIO</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-wrench"></i></h1>
                            <h3 class="aparato_servicio"> --- </h3>
                            <h6>Aparato</h6>
                          </div>
                          <div class="col-sm-4">
                            <h1><i class="fa fa-calendar"></i></h1>
                            <h3 class="fecha_servicio"> --- </h3>
                            <h6>Fecha</h6>
                          </div>
                          <div class="col-12 text-justify mt-2">
                            <h6 class="font-weight-bold">Descripción</h6>
                            <p class="descripcion_servicio"></p>
                            <br>
                            <h6 class="font-weight-bold">Observaciones</h6>
                            <p class="observacion_servicio"></p>
                          </div>
                        </div>
                        <!-- /row -->
                        <h4 class="aparato_servicio">Aparato</h4>
                        <div class="row centered mb">
                          <div class="col-12 d-flex justify-content-center">
                            <ul class="list-group list-group-horizontal">
                              <li class="list-group-item">Marca: <b class="marca_aparato">---</b></li>
                              <li class="list-group-item">Modelo: <b class="modelo_aparato">---</b></li>
                              <li class="list-group-item">Serial: <b class="serial_aparato">---</b></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /row -->
                        <h4>Cliente</h4>
                        <div class="row centered">
                          <div class="col-12 d-flex justify-content-center">
                            <ul class="list-group">
                              <li class="list-group-item text-justify">Nombre: <b class="nombre_cliente">---</b></li>
                              <li class="list-group-item text-justify">Contacto: <b class="contacto_cliente">---</b></li>
                              <li class="list-group-item text-justify">Email: <b class="email_cliente">---</b></li>
                              <li class="list-group-item text-justify">Dirección: <b class="direccion_cliente">---</b></li>
                              <li class="list-group-item text-justify">Municipio: <b class="municipio_cliente">---</b></li>
                            </ul>
                          </div>
                          <!-- /col-md-8 -->
                        </div>
                        <!-- /row -->
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane fade" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <div id="map"></div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Dirección</h4>
                        <div class="row">
                          <div class="col-md-8 offset-2 mt">
                            <p>
                              <?=$tecnico[0]->municipio;?><br/> <?=$tecnico[0]->direccion;?>
                            </p>
                            <br>
                          </div>                          
                        </div>
                        <h4>Contacto</h4>
                        <div class="row">
                          <div class="col-md-8 offset-2 mt">
                            <p>
                              Celular: <?=$tecnico[0]->contacto;?><br/>
                            </p>
                            <br>
                            <p>
                              Email: <?=$tecnico[0]->email;?><br/>
                            </p>
                          </div>
                        </div>                                                      
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane fade" role="tabpanel" aria-labelledby="contact-tab">
                    <form id="formFile" action="<?=base_url()?>servicios/updateTecnico" class="user needs-validation" method="POST" enctype="multipart/form-data" onsubmit="return false" novalidate target="my_iframe">
                      <div class="row">
                        <div class="col-12 col-lg-6 detailed">
                          <h4 class="mb">Información Personal</h4>
                          <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <label class="col control-label"> Imagen de perfil</label>
                            <div class="col">
                              <input type="file" class="file-pos" name="File">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col control-label">Nombres</label>
                            <div class="col">
                              <input type="text" placeholder="Ingresar los nombres" class="form-control" name="nombres" value="<?=$tecnico[0]->nombres?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col control-label">Apellidos</label>
                            <div class="col">
                              <input type="text" placeholder="Ingresar los apellidos" class="form-control" name="apellidos" value="<?=$tecnico[0]->apellidos?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col control-label">Cédula</label>
                            <div class="col">
                              <input type="text" placeholder="Ingresar la cédula" class="form-control" name="cedula" value="<?=$tecnico[0]->cedula?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6 detailed">
                          <h4 class="mb">Información de contacto</h4>                         
                            <div class="form-group">
                              <label class="col control-label">Municipio</label>
                              <div class="col">
                                <select class="form-control" name="municipio">
                                  <option value="" style="display: none;">-- Seleccionar --</option>
                                  <?php foreach ($municipios as $k_m => $v_m) { ?>
                                    <option value="<?=$v_m->municipio?>" <?=($tecnico[0]->municipio==$v_m->municipio)?'selected':''?>><?=$v_m->municipio?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col control-label">Dirección</label>
                              <div class="col">
                                <input type="text" placeholder="Ingresar la dirección" class="form-control" name="direccion" value="<?=$tecnico[0]->direccion?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col control-label">Contacto</label>
                              <div class="col">
                                <input type="text" placeholder="Ingresar el contacto"  class="form-control" name="contacto" value="<?=$tecnico[0]->contacto?>">
                              </div>
                            </div>
                        </div>                        
                        <div class="col-12 d-flex justify-content-center">
                          <div class="form-group">
                            <button class="btn btn-theme04" type="button">Cancelar</button>
                            <button class="btn btn-theme" id="save" type="submit">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

    <?php $this->load->view('common/admin/footer');?>


  </section>
  <iframe id='my_iframe' name='my_iframe' class="d-none" src="" style="width:100%; height:500px;"></iframe>
  <?php $this->load->view('common/admin/js');?>
  <script>

    $(document).on('click', '.view-servicio', function () {
      var _id = $(this).attr('data-id'),
      valor = $(this).attr('data-valor'),
      aparato = $(this).attr('data-aparato'),
      fecha = $(this).attr('data-fecha');
      ajax('servicios/getServicioByID',
      {
        id: _id
      }, function (data) {
        if (data.res=='ok') {
          var info = data.data[0];
          $('.valor_servicio').text(valor)
          $('.aparato_servicio').text(aparato)
          $('.fecha_servicio').text(fecha)
          $('.descripcion_servicio').text(info.descripcion)
          $('.observacion_servicio').text(info.observaciones)
          $('.marca_aparato').text(info.marca)
          $('.modelo_aparato').text(info.modelo)
          $('.serial_aparato').text(info.serial)
          $('.nombre_cliente').text(info.name_cliente)
          $('.contacto_cliente').text(info.contacto)
          $('.email_cliente').text(info.email)
          $('.direccion_cliente').text(info.direccion)
          $('.municipio').text(info.municipio)
        }else{

        }
      }, 10000)
    })

    $('#save').on('click', function () {
      var bandera = 0;
      if ( $('[name=nombres]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar los nombres' })
      }
      if ( $('[name=apellidos').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar los apellidos.' })
      }
      if ( $('[name=cedula').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar la cedula.' })
      }
      if ( $('[name=municipio').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben seleccionar el municipio.' })
      }
      if ( $('[name=contacto').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar el contacto.' })
      }
      
      if (bandera==0) {
        document.getElementById('formFile').submit();
      }        
    })

    $(window).on("message onmessage", function(e) {
      var data1 = e.originalEvent.data;
      datos = JSON.stringify(data1);    
      if (datos!=='""') {
        datos = JSON.parse(datos);
        datos = JSON.parse(datos);
        console.log(datos);
        if(datos.res == "ok"){
          Swal.fire({ icon: 'success', title: 'Se actualizó la información correctamente.', showConfirmButton: false, timer: 1500 })
          setTimeout(function() {
            window.location.href=base_url+"admin/tecnicos";
          }, 1500);
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      }           
    });

    $("#contentServicios").load(base_url+"admin/paginationServiciosByTecnico/<?=$id?>/");
    $(document).on("click", "#pagination-digg1 a", function(e){
      e.preventDefault();
      var href = $(this).attr("href");
      $("#contentServicios").load(href);
    });
  </script>
</body>
</html>