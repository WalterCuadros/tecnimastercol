  
  <div id="opciones-contactanos" class="d-none">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 position-relative">
          <div class="text-right position-absolute">
            <a href="mailto: servicios@tecnimastercol.com">
              <label class="label-white mb-3">Correo Electrónico</label>
              <img src="<?=base_url()?>assets/img/web/correo_electronico.png" class="img-fluid ml-1 my-auto">
            </a>
            <br>
            <a href="tel:+573183935895">
              <label class="label-white mb-3">Llamanos</label>
              <img src="<?=base_url()?>assets/img/web/llamanos.png" class="img-fluid ml-1 my-auto">
            </a>
            <br>
            <a href="https://api.whatsapp.com/send?phone=573183935895">
              <label class="my-auto label-white mb-3">Whatsapp</label>
              <img src="<?=base_url()?>assets/img/web/whatsapp.png" class="img-fluid ml-1 my-auto">
            </a>
          </div>            
        </div>
      </div>
    </div>
  </div>
  <a class="btn-contactanos" target="_blank" href="https://api.whatsapp.com/send?phone=573183935895">
    <img src="<?=base_url()?>assets/img/web/whatsapp_completo.png" class="img-fluid open_">
    <img src="<?=base_url()?>assets/img/web/contactanos_cerrar_completo.png" class="img-fluid close_">
  </a>
  <iframe id='my_iframe' name='my_iframe' class="d-none" src="" style="width:100%; height:500px;"></iframe>  
  <script type="text/javascript">var base_url = "<?=base_url(); ?>"; </script>
  <script src="<?=base_url(); ?>assets/js/web/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery-ui.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/popper.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/bootstrap.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/owl.carousel.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.stellar.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.countdown.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.easing.1.3.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/aos.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.fancybox.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.sticky.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?=base_url(); ?>assets/js/web/bootstrap.bundle.min.js"></script> 
  
  <script src="<?=base_url(); ?>assets/js/web/main.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/web/jquery-1.12.1.min.js"></script>  
  <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
  <script src="<?=base_url(); ?>assets/js/scripts.js"></script>
  
  <script src="<?=base_url()?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

  <script type="text/javascript">
   
    $(".view-section").click(function() {
      event.preventDefault();
      var id_section = $(this).attr('href')
      $('html, body').animate({
          scrollTop: $(id_section).offset().top-54
      }, 1000);
    });

    /* $('.btn-contactanos').on('click', function () {
      if ($(this).attr('class').indexOf('back-open')!==-1) {
        $(this).removeClass('back-open');
        $('#opciones-contactanos').addClass('d-none')
      }else{
        $(this).addClass('back-open')
        $('#opciones-contactanos').removeClass('d-none')
      }
    })
 */
    $('#span-buscar').click(function(){
      //ir a carrito
    });


    $(".nav-link-hover").hover(
      function() {
        if ($(window).width() > 974) {
          var elemento = $(this).attr('data-elemento');
          $('#' + elemento).removeClass('zommOut animated');
          $('#' + elemento).removeClass('d-none');
          $('#' + elemento).addClass('zoomIn animated');
        }
      }, function() {
        if ($(window).width() > 974) {
          var elemento = $(this).attr('data-elemento');
          $('#' + elemento).removeClass('zoomIn animated')
          $('#' + elemento).addClass('d-none');
          $('#' + elemento).addClass('zommOut animated');
        }
      }
    );

    $(".hover-destacados").hover(
      function(){
        $(this).find(".img-div").addClass("card-destacados");
        $(this).find(".card-show").removeClass("d-none");
        $(this).find(".price").addClass("d-none");
        $(this).find(".card").addClass('is-flipped');
      },
      function(){
        $(this).find(".img-div").removeClass("card-destacados");
        $(this).find(".card").removeClass('is-flipped');
        $(this).find(".card-show").addClass("d-none");
        $(this).find(".price").removeClass("d-none");                   
      }
    );  

    $(".hover-destacados").click(function(){
      window.location = base_url + 'web/detalle_servicio';
    });

    //RETORNA EL TRUE SI EL CORREO ES VÁLIDO, FALSE EN CASO CONTRARIO
    function solicitar_precio(s_servicio){
      console.log(s_servicio)
      var bandera=0;
      if($('[name=tipo_aparato]').val()=='Escoge el tipo de aparato'){
        bandera=1;              
        return Swal.fire({ title: 'Error!', text: 'Escoge el tipo de aparato', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=marca_aparato]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Ingresa la marca del aparato', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=tipo_servicio]').val()=='Escoger servicio'){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Escoge el tipo de servicio', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=nombre_cliente]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Ingrese su nombre', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=numero_contacto]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Digite su número de contacto', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=email]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Ingrese su email', icon: 'error', confirmButtonText: 'Ok'});
      }else if (!validarCorreo($('[name=email]').val().trim())){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'La direccón de correo no es válida', icon: 'error', confirmButtonText: 'Ok'});
      }
      if (s_servicio=='1' && !$('#customCheck1').is(":checked")) {
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe aceptar los términos y condiciones de tratamiento de datos', icon: 'error', confirmButtonText: 'Ok'});
      }
      if (bandera==0) {
        if (s_servicio=='1') {
          ajax('servicios/solicitarServicio',
          {   
            s_servicio:s_servicio,
            marca_aparato:$('[name=marca_aparato]').val(),
            nombre_cliente:$('[name=nombre_cliente]').val(),
            numero_contacto:$('[name=numero_contacto]').val(),
            email:$('[name=email]').val(),
            aparato:$('[name=tipo_aparato]').val(),
            servicio:$('[name=tipo_servicio]').val()                 
          },
          function(data){
            if(data.res=="ok"){
              $(".row-servicio").empty(); 
              $(".row-precio").empty(); 
              $(".row-aparato").empty(); 
              $(".row-mensaje").empty(); 
              $(".row-servicio").append('<div class="col-12 col-lg-12">Tipo servicio: '+data.servicio+'</div>')
              $(".row-precio").append('<div class="col-12 col-lg-12">Precio: $'+data.precio+'</div>')
              $(".row-aparato").append('<div class="col-12 col-lg-12">Tipo aparato: '+data.aparato+'</div>')
              $(".row-mensaje").append('<div class="col-12 col-lg-12" id="mensaje"> '+data.msj+'</div>')
              $("#mensaje").data("datos_servicio",{
                marca_aparato:$('[name=marca_aparato]').val(),
                nombre_cliente:$('[name=nombre_cliente]').val(),
                numero_contacto:$('[name=numero_contacto]').val(),
                email:$('[name=email]').val(),
                aparato:$('[name=tipo_aparato]').val(),
                servicio:$('[name=tipo_servicio]').val()
              });
            }else{
               return Swal.fire({ title: 'Error!', text: data.msj, icon: 'error', confirmButtonText: 'Ok'});
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
          ajax('servicios/solicitarServicio',
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
              return Swal.fire({text: 'Gracias por escoger nuestros servicios\nEn unos minutos nos pondremos en contacto contigo.', icon: 'success', confirmButtonText: 'Ok'});
            }else{
              return Swal.fire({ title: 'Error!', text: data.msj, icon: 'error', confirmButtonText: 'Ok'});
            }
            $('[name=marca_aparato]').val("")
            $('[name=nombre_cliente]').val("")
            $('[name=numero_contacto]').val("")
            $('[name=email]').val("")
            $('[name=tipo_aparato]').val("")
            $('[name=tipo_servicio]').val("")
          },10000);          
        }
      }
    }

    function myRegistrate() { 
      var bandera=0;
      if($('[name=nombres]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe ingresar sus nombres', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=apellidos]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe ingresar sus apellidos', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=email]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe ingresar el correo para continuar', icon: 'error', confirmButtonText: 'Ok'});
      } else if(!validarCorreo($('[name=email]').val())){
        bandera=1;
        $('[name=email]').val('');
        return Swal.fire({ title: 'Error!', text: 'Debe ingresar un email válido para continuar', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=contraseña]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe ingresar la contraseña para continuar', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=confirm]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe confirmar su contraseña para continuar', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=confirm]').val()==$('[name=contraseña]').val()){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'La contraseña no coincide', icon: 'error', confirmButtonText: 'Ok'});
      }
      if(bandera==0){
        ajax('servicios/registrate',
        {   
          nombres:$('[name=nombres]').val(),
          apellidos:$('[name=apellidos]').val(),
          email:$('[name=email]').val(),
          contrasena:$('[name=contrasena]').val()                
        },
        function(data){
          if(data.res=="ok"){
            $('[name=nombres]').val('');
            $('[name=apellidos]').val('');
            $('[name=email]').val('');
            $('[name=contrasena]').val('');
            return Swal.fire({text: 'Se ha registrado en el sistema Tecnimaster', icon: 'success', confirmButtonText: 'Ok'});
          }else{
            return Swal.fire({ title: 'Error!', text: data.msj , icon: 'error', confirmButtonText: 'Ok'});
          }
        },10000);
        $('[name=email]').val('');
      }
    }

    function registrar_promocion(){
      var bandera=0;
      /*if($('[name=marca_promocion]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Digite la marca del aparato', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=tipo_aparatos_promo]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Seleccione tipo aparato', icon: 'error', confirmButtonText: 'Ok'});
      }*/
      if($('[name=nombre_cliente_promo]').val()==''){
        bandera=1;              
        return Swal.fire({ title: 'Error!', text: 'Digite su nombre', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=apellidos_cliente_promo]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Digite sus apellidos', icon: 'error', confirmButtonText: 'Ok'});
      }
      if($('[name=email_promo]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Ingrese su email', icon: 'error', confirmButtonText: 'Ok'});
      }else if (!validarCorreo($('[name=email_promo]').val().trim())){
         bandera=1;
         return Swal.fire({ title: 'Error!', text: 'La direccón de correo no es válida', icon: 'error', confirmButtonText: 'Ok'});
      }      
      if($('[name=celular_promo]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Digite su número de contacto', icon: 'error', confirmButtonText: 'Ok'});
      }
     /* if($('[name=direccion_promo]').val()==''){
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Digite su dirección', icon: 'error', confirmButtonText: 'Ok'});
      }*/
      if (!$('#customCheck1').is(":checked")) {
        bandera=1;
        return Swal.fire({ title: 'Error!', text: 'Debe aceptar los términos y condiciones de tratamiento de datos', icon: 'error', confirmButtonText: 'Ok'});
      }
      
      if(bandera == 0)
      {
        document.getElementById('prom_reg').submit(); 
        location.reload();
      }


     /*  if (bandera==0) {
          ajax('servicios/registrarPromocion',
          {   
            nombres:$('[name=nombres]').val(),
            apellidos:$('[name=apellidos]').val(),
            celular:$('[name=celular]').val(),
            email:$('[name=emails]').val(),
            id_aparato:$('[name=tipo_aparatos]').val(),
            marca_aparato:$('[name=marca]').val(),
            direccion:$('[name=direccion]').val()
                   
          },
          function(data){
            if(data.res=="ok"){
              Swal.fire({icon: 'success', title: 'Registrado', showConfirmButton: false,timer: 1600})
              window.open( base_url+"servicios/generate_pdf/"+data.id_solicitud)  ;
              window.location.href=base_url+"web/index";
            }else{
               return Swal.fire({ title: 'Error!', text: data.msj, icon: 'error', confirmButtonText: 'Ok'});
            }
          },10000);
        
      } */
    }

  </script>