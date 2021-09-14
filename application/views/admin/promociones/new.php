<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Promoción<a href="<?=base_url()?>admin/promociones" class="btn btn-info"><i class="fa fa-arrow-left"></i></a></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4>Nueva promoción</h4>
              </div>
              <div class="card-body">
                <form id="formFile" action="<?=base_url()?>servicios/newPromocion" class="user needs-validation" method="POST" enctype="multipart/form-data" onsubmit="return false" novalidate target="my_iframe">
                  <div class="row">
                    <div class="col-12 col-lg-6 detailed">
                      <h4 class="mb">Información de la Promoción</h4>
                      <div class="form-group">
                        <label class="col control-label"> Imagen de fondo</label>
                        <div class="col">
                          <input type="file" class="file-pos" name="file_img">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Nombre raiz</label>
                        <div class="col">
                          <input type="text" placeholder="Ingresar los nombre promoción" class="form-control" name="raiz">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Nombre promoción</label>
                        <div class="col">
                          <input type="text" placeholder="Ingresar los nombre promoción" class="form-control" name="nombres">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Vigencia</label>
                        <div class="col">
                          <input type="text" placeholder="Tiempo de vigencia" class="form-control" name="vigencia">
                        </div>
                      </div>   
                      <div class="form-group">
                        <label class="col control-label">Fecha de inicio de promoción</label>
                        <div class="col">
                          <input type="date"  class="form-control" name="f_inicio">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col control-label">Fecha de finalización de promoción</label>
                        <div class="col">
                          <input type="date"  class="form-control" name="f_fin">
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 detailed">
                      <div class="form-group">
                        <label class="col control-label">Porcentaje descuento</label>
                        <div class="col">
                          <input type="number" placeholder="Porcentaje descuento" class="form-control" name="descuento">
                        </div>
                      </div>                     
                        <div class="form-group">
                          <label class="col control-label">Cabecera</label>
                          <div class="col">
                            <textarea name="cabecera" rows="4" cols="20" placeholder="Digite contenido cabecera" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Pie de pagina</label>
                          <div class="col">
                            <textarea name="footer" rows="4"  placeholder="Digite contenido pie de página"  cols="20" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col control-label">Estado</label>
                          <div class="col">
                            <select class="form-control" name="estado">
                              <option value="1" >Activo</option>
                              <option value="0" >Inactivo</option>
                            </select>
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
      if ( $('[name=file_img]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Seleccione imagen' })
      }
      if ( $('[name=nombres]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar el nombre de la promoción' })
      }
      if ( $('[name=f_inicio]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar la fecha de inicio' })
      }
      if ( $('[name=f_fin]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar la fecha de finalización' })
      }
      if ( $('[name=cabecera]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Digite el contenido de la cabecera' })
      }
      if ( $('[name=footer]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Digite el contenido de pie de página' })
      }
      if ( $('[name=vigencia]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Digite la vigencia de la promocion' })
      }
      if ( $('[name=descuento]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Digite el porcentaje de descuento' })
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
           window.location.href=base_url+"admin/promociones";
          }, 1500);
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      }           
    });
  </script>
</body>
</html>