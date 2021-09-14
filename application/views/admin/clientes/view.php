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
            <?php if ($this->session->userdata('rol')=='1') { ?>
            <a href="<?=base_url()?>admin/clientes" class="btn btn-info p-absolute t-15"><i class="fa fa-arrow-left"></i></a>
            <?php } ?>
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?=$total_aparatos?></h4>
                  <h6>Total Aparatos</h6>
                  <h4><?=$total_servicios?></h4>
                  <h6>Total Servicios</h6>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?=$cliente[0]->name." ".$cliente[0]->apellidos?> 
                  <br> 
                  <?php if ($this->session->userdata('rol')=='1') { ?>
                  <button class="btn btn-success" data-toggle="modal" data-target="#aparatoModal"><i class="fa fa-plus"></i> Aparato</button> 
                  <!-- <button class="btn btn-success orden_servicio" data-toggle="modal" data-target="#servicioModal"><i class="fa fa-plus"></i> Servicio</button> -->
                  <?php } ?>
                  <!-- <?php if ($this->session->userdata('rol')=='2') { ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#solicitudModal"><i class="fa fa-plus"></i> Solicitar servicio</button>
                  <?php } ?> -->
                </h3>
                <p>Celular: <?=$cliente[0]->contacto?></p>
                <p>Email: <?=$cliente[0]->email?></p>
                <p>Dirección:  <?=$cliente[0]->municipio;?> - <?=$cliente[0]->direccion;?></p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?=base_url()?>assets/img/<?=(!empty($cliente[0]->foto_perfil))?'clientes/'.$cliente[0]->foto_perfil:'default-avatar.png'?>" class="img-circle"></p>
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
                    <a class="nav-link active" id="aparatos-tab" data-toggle="tab" href="#aparatos" role="tab" aria-controls="aparatos" aria-selected="true">Aparatos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" class="contact-map" role="tab" aria-controls="contact" aria-selected="true">Contacto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Editar perfil</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="card-body w-100">
                <div class="tab-content" id="myTabContent">
                  <div id="aparatos"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="aparatos-tab">
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <h4>Todos los aparatos</h4>
                        <div id="contentAparato"></div>
                      </div>
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="row d-none" id="detalleAparato">                      
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
                        <h4>Técnico</h4>
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
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane fade" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <h3 ><i class="fa fa-plus"></i> Nuevo servicio</h3>   
                        <!-- content goes here -->
                        <?php if ($this->session->userdata('rol')=='1') { ?>
                        <form id="frm-aparato">
                          <div class="row">
                            <div class="col-xs-12 col-md-6 form-group">
                              <label>Orden servicio</label>
                              <input type="text" name="orden_servicio"  class="form-control" id="or_servicio" placeholder="No. orden">
                            </div>
                            <div class="col-xs-12 col-md-6 form-group">
                              <label>Serial</label>
                              <select name="servicio_id_aparato" class="form-control">
                                <option style="display: none;">Seleccione serial</option>
                                <?php foreach($listado_aparatos as $aparatos): ?>
                                <option value="<?php echo $aparatos->id_aparato?>"><?php echo $aparatos->serial?></option>
                                <?php endforeach ?>                    
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-md-6 form-group">
                              <label>Tecnico</label>
                              <select name="tecnico" class="form-control">
                                <option style="display: none;">Seleccione técnico</option>
                                <?php foreach($listado_tecnicos as $tecnicos): ?>
                                <option value="<?php echo $tecnicos->id?>"><?php echo $tecnicos->nombres?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-xs-12 col-md-6 form-group">
                              <label>Fecha</label>
                              <input type="date" name="fecha" class="form-control" placeholder="Ingrese fecha">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3"></textarea>  
                          </div>
                          <div class="form-group">
                            <label>Observaciones</label>
                            <textarea class="form-control" name="observaciones" rows="3"></textarea>  
                          </div>
                          <div class="col-xs-12 col-md-12 p-0">
                            <h5>Valor del servicio: <b id="valor_total">$0</b></h5>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-md-6">
                              <div class="form-group">
                                <label>Valor técnico</label>
                                <input name="valor_tecnico" class="form-control" value="$0">
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                              <div class="form-group">
                                <label>Valor Tecnimaster</label>
                                <input name="valor_tecnimaster" class="form-control" value="$0">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-md-12">
                              <div class="form-group">
                                <button type="button" class="btn btn-primary btn-hover-green" onclick="guardarServicio()" role="button">Crear servicio</button>
                              </div>
                            </div>
                          </div>                              
                        </form>
                        <?php } ?>
                        <?php if ($this->session->userdata('rol')=='2') { ?>
                        <form id="frm-aparato" class="row">
                          <div class="col-xs-12 col-md-6">                            
                            <div class="form-group">
                              <label>Tipo de servicio*</label>
                              <select class="selectpicker form-control"name="tipo_servicio_cli">
                                <option value="Escoger servicio" style="display: none">Escoger sevicio</option>
                                <option value="Revisión técnica">Revisión técnica</option>
                                <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label>Tipo de aparato*</label>
                              <select name="id_aparato_servicio_cli" class="form-control">
                                <option style="display: none;">Seleccione serial</option>
                                <?php foreach ($tipo_aparato as $ktp => $vtp): ?>
                                <option value="<?=$vtp->id_tipo_aparato?>"><?=$vtp->tipo?></option>
                                <?php endforeach ?>
                                <!-- <?php foreach($listado_aparatos as $aparatos): ?>
                                <option value="<?php echo $aparatos->id_aparato?>" data-marca="<?=$aparatos->marca?>" data-serial="<?=$aparatos->serial?>"><?php echo $aparatos->tipo_aparato?></option>
                                <?php endforeach ?>   -->                  
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label>Marca</label>
                              <input id="marca_servicio_cli" class="form-control" disabled>
                            </div>
                          </div>
                          <!-- <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label>Serial</label>
                              <input id="serial_servicio_cli" class="form-control" disabled>
                            </div>                              
                          </div> --> 
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label>Número de contacto</label>
                              <input type="text" name="numero_contacto_servicio_cli" class="form-control" placeholder="Número de contacto" onkeypress="return onlyNumber(event)"> 
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label>Email de contacto</label>
                              <input type="text" name="email_contacto_servicio_cli" class="form-control" placeholder="Email de contacto">
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-hover-green" onclick="solicitarServicio()" role="button">Solicitar servicio</button>
                            </div> 
                          </div>
                        </form>
                        <?php } ?>
                                                 
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Dirección</h4>
                        <div class="row">
                          <div class="col-md-8 offset-2 mt">
                            <p>
                              <?=$cliente[0]->municipio;?><br/> <?=$cliente[0]->direccion;?>
                            </p>
                            <br>
                          </div>                          
                        </div>
                        <h4>Contacto</h4>
                        <div class="row">
                          <div class="col-md-8 offset-2 mt">
                            <p>
                              Celular: <?=$cliente[0]->contacto;?><br/>
                            </p>
                            <br>
                            <p>
                              Email: <?=$cliente[0]->email;?><br/>
                            </p>
                          </div>
                        </div>                                                      
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane fade" role="tabpanel" aria-labelledby="edit-tab">
                    <form id="formFile" action="<?=base_url()?>servicios/updatecliente" class="user needs-validation" method="POST" enctype="multipart/form-data" onsubmit="return false" novalidate target="my_iframe">
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
                              <input type="text" placeholder="Ingresar los nombres" class="form-control" name="nombres" value="<?=$cliente[0]->name?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col control-label">Apellidos</label>
                            <div class="col">
                              <input type="text" placeholder="Ingresar los apellidos" class="form-control" name="apellidos" value="<?=$cliente[0]->apellidos?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col control-label">Contraseña</label>
                            <div class="col">
                              <input type="password" placeholder="Ingresar la contraseña" class="form-control" name="password">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6 detailed">
                          <h4 class="mb">Información de contacto</h4>
                          <form role="form" class="form-horizontal">                          
                            <div class="form-group">
                              <label class="col control-label">Municipio</label>
                              <div class="col">
                                <select class="form-control" name="municipio">
                                  <option value="" style="display: none;">-- Seleccionar --</option>
                                  <?php foreach ($municipios as $k_m => $v_m) { ?>
                                    <option value="<?=$v_m->municipio?>" <?=($cliente[0]->municipio==$v_m->municipio)?'selected':''?>><?=$v_m->municipio?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col control-label">Dirección</label>
                              <div class="col">
                                <input type="text" placeholder="Ingresar la dirección" class="form-control" name="direccion" value="<?=$cliente[0]->direccion?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col control-label">Contacto</label>
                              <div class="col">
                                <input type="text" placeholder="Ingresar el contacto"  class="form-control" name="contacto" value="<?=$cliente[0]->contacto?>" onkeypress="return onlyNumber(event)">
                              </div>
                            </div>                            
                          </form>
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

    <!-- /MODAL NUEVO APARATO -->
    <div class="modal fade" id="aparatoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-wrench"></i> Nuevo aparato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipo aparato</label>
              <select class="form-control" name="aparato">
                <option value="" style="display: none;">- Seleccionar -</option>
                <?php foreach ($tipo_aparato as $ktp => $vtp): ?>
                  <option value="<?=$vtp->id_tipo_aparato?>"><?=$vtp->tipo?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Marca</label>
              <input name="marca" class="form-control">
            </div>
            <div class="form-group">
              <label>Modelo</label>
              <input name="modelo" class="form-control">
            </div>
            <div class="form-group">
              <label>Serial</label>
              <input name="serial" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="save-aparato">Guardar</button>
          </div>
        </div>
      </div>
    </div> 
    <!-- modal nuevo aparato end-->
    <!-- MODAL EDITAR APARATO -->
    <div class="modal fade" id="editarAparatoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-wrench"></i> Editar aparato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <input type="hidden" name="id_aparato">
          <div class="modal-body">
            <div class="form-group">
              <label>Marca</label>
              <input name="edit-marca" class="form-control">
            </div>
            <div class="form-group">
              <label>Modelo</label>
              <input name="edit-modelo" class="form-control">
            </div>
            <div class="form-group">
              <label>Serial</label>
              <input name="edit-serial" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="save-editar-aparato">Guardar</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="modal-servicio" tabindex="-1" role="dialog" aria-labelledby="modal-servicio" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Resumen servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row row-aparato"></div>
            <div class="row row-servicio"></div>
            <div class="row row-precio"></div>
            <div class="row row-mensaje"></div>
            <input type="hidden" id="mensaje">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-modal" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary btn-modal"  onclick="solicitar_precio('2')">Pedir servicio</button>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('common/admin/footer');?>

  </section>
  <iframe id='my_iframe' name='my_iframe' class="d-none" src="" style="width:100%; height:500px;"></iframe>
  <?php $this->load->view('common/admin/js');?>
  <script>
    //VER SERVICIO
    $(document).on('click', '.view-servicio', function () {
      var _id = $(this).attr('data-id'),
      valor = $(this).attr('data-valor'),
      aparato = $(this).attr('data-aparato'),
      fecha = $(this).attr('data-fecha');
      ajax('servicios/getServicioByIDTecnico',
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
        }
      }, 10000)
    })

    //NUEVO APARATO
    $(document).on('click', '#save-aparato', function () {
      var bandera = true
      if ( $('[name=aparato]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben seleccionar el tipo de aparato' })
      }
      if ( $('[name=marca]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar la marca para el aparato' })
      }
      if ( $('[name=modelo]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar el modelo para el aparato' })
      }
      if ( $('[name=serial]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar el serial para el aparato' })
      }
      if (bandera) {
        ajax('servicios/newAparatoBycliente',
        {
          tipo_aparato: $('[name=aparato]').val(),
          name_aparato: $('[name=aparato]').children("option:selected").html(),
          marca: $('[name=marca]').val(),
          serial: $('[name=serial]').val(),
          modelo: $('[name=modelo]').val(),
          id_cliente: '<?=$id?>'
        }, function (data) {
          if (data.res=='ok') {
            $('[name=aparato]').val('')
            $('[name=marca]').val('')
            $('[name=serial]').val('')
            $('[name=modelo]').val('')
            Swal.fire({ icon: 'success', title: 'Se creo el aparato correctamente.', showConfirmButton: false, timer: 1500 })
            setTimeout(function() {
              window.location.href=base_url+"admin/viewcliente/<?=$id?>";
            }, 1500);
          }else{
            Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
          }
        }, 10000)
      }
    })

    //UPDATE APARATO
    $(document).on('click', '.edit-aparato', function () {
      $('[name=id_aparato]').val($(this).attr('data-id'))
      $('[name=edit-marca]').val($(this).attr('data-marca'))
      $('[name=edit-serial]').val($(this).attr('data-serial'))
      $('[name=edit-modelo]').val($(this).attr('data-modelo'))
    })
    //update aparato
    $(document).on('click', '#save-editar-aparato', function () {
      var bandera = true
      if ( $('[name=edit-marca]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar la marca para el aparato' })
      }
      if ( $('[name=edit-modelo]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar el modelo para el aparato' })
      }
      if ( $('[name=edit-serial]').val()=='' ) {
        bandera=false;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Deben ingresar el serial para el aparato' })
      }
      if (bandera) {
        ajax('servicios/updateAparatoBycliente',
        {
          id: $('[name=id_aparato]').val(),
          marca: $('[name=edit-marca]').val(),
          serial: $('[name=edit-serial]').val(),
          modelo: $('[name=edit-modelo]').val()
        }, function (data) {
          if (data.res=='ok') {
            $('[name=id_aparato]').val('')
            $('[name=edit-marca]').val('')
            $('[name=edit-serial]').val('')
            $('[name=edit-modelo]').val('')
            Swal.fire({ icon: 'success', title: 'Se actualizó la información correctamente.', showConfirmButton: false, timer: 1500 })
            setTimeout(function() {
              window.location.href=base_url+"admin/viewcliente/<?=$id?>";
            }, 1500);
          }else{
            Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
          }
        }, 10000)
      }
    })
    function currencyToNumber(e) {
      return parseInt(e.replace('$', '').replace('.', ''))
    }
    function currencyFormat(num) {
      return '$' + num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    $( '[name=valor_tecnico], [name=valor_tecnimaster]' ).on( 'change', function () {
      var valor_tecnico = currencyToNumber( $( '[name=valor_tecnico]' ).val() ),
        valor_tecnimaster = currencyToNumber( $( '[name=valor_tecnimaster]' ).val() ),
        total = valor_tecnico + valor_tecnimaster,
        output=currencyFormat(valor_tecnico); 
     // $(this).val(output);
      $('#valor_total').html(currencyFormat(total))
    })

    //NUEVO SERVICIO
    function guardarServicio(){
      var bandera=0;
      if($('[name=orden_servicio]').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Digite el No. orden servicio' })
      }   
      if($('[name=servicio_id_aparato]').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Seleccione serial' })
      }
      
      if($('[name=tecnico]').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Seleccione el tecnico' })
      }
      if($('[name=fecha').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingrese la fecha' })
      }
      if($('[name=descripcion').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingrese la descripcion' })
      }
      /*if($('[name=observaciones').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingrese las observaciones' })
      }*/
      if($('[name=valor_tecnico').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingrese el valor para el ténico' })
      }
      if($('[name=valor_tecnimaster').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingrese el valor para el Tecnimaster' })
      }

      if(bandera==0){
        ajax('servicios/guardarServicioByAparato',
        {  
          //clave_servicio: $('[name=clave_solicitud]').val(),
          tecnico: $('[name=tecnico]').val(),
          fecha: $('[name=fecha]').val(),
          descripcion: $('[name=descripcion]').val(),
          observaciones: $('[name=observaciones]').val(),
          valor_tecnico: currencyToNumber( $( '[name=valor_tecnico]' ).val() ),
          valor_tecnimaster: currencyToNumber( $( '[name=valor_tecnimaster]' ).val() ),
          valor: currencyToNumber( $( '#valor_total' ).html() ),
          id_usuario:'<?=$id;?>',
          id_aparato:$('[name=servicio_id_aparato]').val(),
          orden_servicio:$('[name=orden_servicio]').val(),
        },
        function(data){
          if(data.res=="ok"){
            Swal.fire({ icon: 'success', title: 'Se ha registrado el servicio.', showConfirmButton: false, timer: 1500 })
            setTimeout(function() {
              window.location.href=base_url+"admin/viewcliente/<?=$id?>";
            }, 1500);
          }else{
            alert(data.msj);
          }
        },10000);           
      }
    }

    //EDIT PERFIL
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
        if(datos.res == "ok"){
          Swal.fire({ icon: 'success', title: 'Se actualizó la información correctamente.', showConfirmButton: false, timer: 1500 })
          setTimeout(function() {
            if ('<?php $this->session->userdata('rol') ?>'=='1') {                
              //window.location.href=base_url+"admin/clientes";
            }else{
              //location.reload();
            }            
          }, 1500);
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      }           
    });

    $("#contentAparato").load(base_url+"admin/paginationAparatosByCliente/<?=$id?>/", {'id_servicio':'<?=$id_servicio?>', 'id_tipo_aparato':'<?=$id_tipo_aparato?>'}, function (response, status, xhr) {
      openServicio()
    })
    $(document).on("click", "#pagination-digg2 a", function(e){
      var href = $(this).attr("href");
      $("#contentAparato").load(href, {'id_servicio':'<?=$id_servicio?>', 'id_tipo_aparato':'<?=$id_tipo_aparato?>'}, function (response, status, xhr) {
        openServicio()
      })
    });

    var found = 0;
    function openServicio() {
      $('.view-aparato').each(function () {
        if ($(this).attr('data-id')=='<?=$id_tipo_aparato?>') {
          found = 1;
          $(this).trigger( "click" );
        }
      })
      if (found===0) {
        $("#pagination-digg2 a.page-link").each(function () {
          if ($(this).attr('rel')!==undefined && $(this).attr('rel').indexOf('next')!==-1) {
            $(this).trigger( "click" );
          }
        })
      }
    }

    $(document).on('click', '.view-aparato', function () {
      var id = $(this).attr('data-id')
      $("#contentServicios").load(base_url+"admin/paginationServiciosByAparato/"+id+'/', function (response, status, xhr) {
        openServicio_fase2()
      })
      $('#detalleAparato').removeClass('d-none')
    })    
    $(document).on("click", "#pagination-digg1 a", function(e){
      e.preventDefault();
      var href = $(this).attr("href");
      $("#contentServicios").load(href, function (response, status, xhr) {
        openServicio_fase2()
      })
    });
    var found_s = 0;
    function openServicio_fase2() {
      $('.view-servicio').each(function () {
        if ($(this).attr('data-id')=='<?=$id_servicio?>') {
          found_s = 1;
          $(this).trigger( "click" );
        }
      })
      if (found_s===0) {
        $("#pagination-digg1 a.page-link").each(function () {
          if ($(this).attr('rel')!==undefined && $(this).attr('rel').indexOf('next')!==-1) {
            $(this).trigger( "click" );
          }
        })
      }
    }

    function solicitar_precio(s_servicio){
      var bandera=0;
      if($('[name=aparato_solicitud]').val()=='Escoge el tipo de aparato'){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Escoge el tipo de aparato' })
      }
      if($('[name=marca_solicitud]').val()==''){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Ingresa la marca del aparato' })
      }
      if($('[name=tipo_servicio_solicitud]').val()=='Escoger servicio'){
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Escoge el tipo de servicio' })
      }
      if (bandera==0) {
        var nombre='<?=$cliente[0]->name." ".$cliente[0]->apellidos?>';
        var email= '<?=$cliente[0]->email?>';
        var contacto= '<?=$cliente[0]->contacto?>';
        if (s_servicio=='1') {
          ajax('servicios/solicitar_servicio',
          {   
            s_servicio:s_servicio,
            marca_aparato:$('[name=marca_solicitud]').val(),
            nombre_cliente:nombre,
            numero_contacto:contacto,
            email:email,
            aparato:$('[name=aparato_solicitud]').val(),
            servicio:$('[name=tipo_servicio_solicitud]').val()                   
          },
          function(data){
            if(data.res=="ok"){
              $(".row-servicio").empty(); 
              $(".row-precio").empty(); 
              $(".row-aparato").empty(); 
              $(".row-mensaje").empty(); 

              $(".row-servicio").append('<div class="col-xs-12 col-md-12">Tipo servicio: '+data.servicio+'</div>')
              $(".row-precio").append('<div class="col-xs-12 col-md-12">Precio: $'+data.precio+'</div>')
              $(".row-aparato").append('<div class="col-xs-12 col-md-12">Tipo aparato: '+data.aparato+'</div>')
              $(".row-mensaje").append('<div class="col-xs-12 col-md-12" id="mensaje"> '+data.msj+'</div>')
              $("#mensaje").data("datos_servicio",{
                marca_aparato:$('[name=marca_aparato]').val(),
                nombre_cliente:nombre,
                numero_contacto:contacto,
                email:email,
                aparato:$('[name=tipo_aparato]').val(),
                servicio:$('[name=tipo_servicio]').val()
              });
            }else{
              return Swal.fire({ icon: 'error', title: 'Oops...', text: data.msj })
            }
          },10000);
          $("#modal-servicio").modal("show");
        }else{
          var marca_aparato= $('#mensaje').data('datos_servicio').marca_aparato;
          var nombre_cliente= $('#mensaje').data('datos_servicio').nombre_cliente;
          var numero_contacto= $('#mensaje').data('datos_servicio').numero_contacto;
          var aparato= $('#mensaje').data('datos_servicio').aparato;
          var servicio= $('#mensaje').data('datos_servicio').servicio;
          var email= $('#mensaje').data('datos_servicio').email;
          $("#modal-servicio").modal("hide");
          ajax('servicios/solicitar_servicio',
          {   
            s_servicio:s_servicio,
            marca_aparato:marca_aparato,
            nombre_cliente:nombre_cliente,
            numero_contacto:numero_contacto,
            email:email,
            aparato:aparato,
            servicio:servicio,  
          },
          function(data){
            if(data.res=="ok"){
              Swal.fire({ icon: 'success', title: 'En unos minutos uno de nuestros asesores se pondra en contacto contigo', showConfirmButton: false, timer: 1500 })              
            }else{
              return Swal.fire({ icon: 'error', title: 'Oops...', text: data.msj })
            }
            setTimeout(function() {
              location.reload();
            }, 1500);            
          },10000);            
        }
      }
    }

    $('.orden_servicio').on('click', function () {
       ajax('servicios/get_orden_servicio',
        {},
        function(data){
          $('#clave_solicitud').val(data.orden_servicio)           
        },10000);
    })

    $('[name=id_aparato_servicio_cli]').on('change', function () {
      if ($(this).val()!='') {
        $('#marca_servicio_cli').val($('[name=id_aparato_servicio_cli] option:selected').attr('data-marca'))
        $('#serial_servicio_cli').val($('[name=id_aparato_servicio_cli] option:selected').attr('data-serial'))
      }
    })

    function solicitarServicio() {
      var bandera = 0
      if ($('[name=tipo_servicio_cli]').val()!='') {
        bandera=1
        return Swal.fire({ icon: 'error', title: 'Oops...', text:'Debe seleccionar el tipo de servicio' })
      }
      if ($('[name=id_aparato_servicio_cli]').val()!='') {
        bandera=1
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe seleccionar el tipo de aparato' })
      }
      if ($('[name=numero_contacto_servicio_cli]').val()!='') {
        bandera=1
        return Swal.fire({ icon: 'error', title: 'Oops...', text:'Debe agregar un número de contacto' })
      }
      if ($('[name=email_contacto_servicio_cli]').val()!='') {
        bandera=1
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe agregar un email de contacto' })
      }else{
        if (!validarCorreo($('[name=email_contacto_servicio_cli]').val())) {
          bandera=1
          return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Formato de email incorrecto' })
        }
      }
      if (bandera==0) {
        ajax('servicios/solicitarServicio',
        {   
          s_servicio:'2',
          marca_aparato:$('#marca_servicio_cli').val(),
          nombre_cliente:'<?=$cliente[0]->name." ".$cliente[0]->apellidos?>',
          numero_contacto:$('[name=numero_contacto_servicio_cli]').val(),
          email:$('[name=email_contacto_servicio_cli]').val(),
          aparato:$('[name=id_aparato_servicio_cli]').val(),
          servicio:$('[name=tipo_servicio_cli]').val()                 
        },
        function(data){
          $('#clave_solicitud').val(data.orden_servicio)           
        },10000);
      }
    }

  </script>
</body>

</html>
