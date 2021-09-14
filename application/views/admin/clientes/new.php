<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Cliente <a href="<?=base_url()?>admin/clientes" class="btn btn-info"><i class="fa fa-arrow-left"></i></a></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4>Nuevo</h4>
              </div>
              <div class="card-body">
                <form id="formFile" action="<?=base_url()?>servicios/newCliente" class="user needs-validation" method="POST" enctype="multipart/form-data" onsubmit="return false" novalidate target="my_iframe">
                  <div class="row">
                    <div class="col-12 col-lg-6 detailed">
                      <h4 class="mb">Información Personal</h4>
                      <div class="form-group">
                        <label class="col control-label"> Imagen de perfil</label>
                        <div class="col">
                          <input type="file" class="file-pos" name="File">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Nombres</label>
                        <div class="col">
                          <input type="text" placeholder="Ingresar los nombres" class="form-control" name="nombres">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Apellidos</label>
                        <div class="col">
                          <input type="text" placeholder="Ingresar los apellidos" class="form-control" name="apellidos">
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
                                <option value="<?=$v_m->codigo?>"><?=$v_m->municipio?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Dirección</label>
                          <div class="col">
                            <input type="text" placeholder="Ingresar la dirección" class="form-control" name="direccion">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Contacto</label>
                          <div class="col">
                            <input type="text" placeholder="Ingresar el contacto"  class="form-control" name="contacto">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Email</label>
                          <div class="col">
                            <input placeholder="Ingresar el email"  class="form-control" name="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Contraseña</label>
                          <div class="col">
                            <input type="password" placeholder="Ingresar la contraseña"  class="form-control" name="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Confirmación de la contraseña</label>
                          <div class="col">
                            <input type="password" placeholder="Ingresar la contraseña"  class="form-control" name="password1">
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
  <iframe id='my_iframe' name='my_iframe' class="d-none" src="" style="width:100%; height:500px;"></iframe>
  <script type="text/javascript">
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
      if ( $('[name=email]').val()=='' && !validarCorreo(email) ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar un correo electrónico válido!' })
      }
      if ($('[name=password]').val()=='') {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar la contraseña' })
      }
      if ($('[name=password1]').val()=='') {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar la confirmación de la contraseña' })
      }
      if ($('[name=password1]').val()!=$('[name=password]').val()) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ser igual las contraseñas' })
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
            window.location.href=base_url+"admin/clientes";
          }, 1500);
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      }           
    });
  </script>
</body>
</html>