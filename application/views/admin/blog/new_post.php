<?php $this->load->view('common/admin/head');?>
</head>
<body>
  <section id="container">
    <?php $this->load->view('common/admin/navbar');?>

    <?php $this->load->view('common/admin/sidebar');?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 class="mt-4"><i class="fa fa-angle-right"></i> Post<a href="<?=base_url()?>admin/posts" class="btn btn-info"><i class="fa fa-arrow-left"></i></a></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="card h-100">
              <div class="card-header">
                <h4>Nueva Post</h4>
              </div>
              <div class="card-body">
                <form id="formFile" action="<?=base_url()?>servicios/new_post" class="user needs-validation" method="POST" enctype="multipart/form-data" onsubmit="return false" novalidate target="my_iframe">
                  <div class="row">
                    <div class="col-12 col-lg-6 detailed">
                      <h4 class="mb">Información del Post</h4>
                      <div class="form-group">
                        <label class="col control-label"> Imagen</label>
                        <div class="col">
                          <input type="file" class="file-pos" name="file_img">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col control-label">Titulo del Post</label>
                        <div class="col">
                          <input type="text" placeholder="Ingresar titulo" class="form-control" name="titulo">
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-lg-6 detailed">
                            
                        <div class="form-group">
                          <label class="col control-label">Contenido</label>
                          <div class="col">
                            <textarea name="contenido" rows="4"  placeholder="Digite contenido"  cols="20" class="form-control"></textarea>
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
                        <div class="form-group">
                        <label class="col control-label">Video</label>
                        <div class="col">
                          <input type="text" placeholder="Url video" class="form-control" name="video">
                        </div>
                      </div>
                    </div>  
                    <div class="col-12 col-lg-12 detailed">
                        <div class="form-group">
                          <label class="col control-label">Titulo del SEO</label>
                          <div class="col">
                            <input type="text" placeholder="Ingresar titulo" class="form-control" name="seo">
                          </div>
                        </div>
                      <div class="form-group">
                          <label class="col control-label">Descripción</label>
                          <div class="col">
                            <textarea name="description" rows="4"  placeholder="Digite contenido"  cols="20" class="form-control"></textarea>
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
      if ( $('[name=title]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar el titulo del post' })
      }
      if ( $('[name=contenido]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar el contenido' })
      }
      if ( $('[name=description]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar la descripción' })
      }
      if ( $('[name=seo]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe ingresar titulo SEO' })
      }
      if ( $('[name=estado]').val()=='' ) {
        bandera=1;
        return Swal.fire({ icon: 'error', title: 'Oops...', text: 'Debe seleccionar estado' })
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
           window.location.href=base_url+"admin/posts";
          }, 1500);
        }else{
          Swal.fire({ icon: 'error', title: 'Oops...', text: datos.msj })
        }
      }           
    });
  </script>
</body>
</html>