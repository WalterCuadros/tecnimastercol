<!DOCTYPE html>
<html lang="en">
<head><meta charset="big5">
       
  <title>Login | Tecnimastercol</title>
  <meta name="description" content="Inicia Sesión en nuestro Sistema de registro de servicios técnicos." /> 
<?php $this->load->view('common/admin/head'); ?>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 text-right mt-3">
				<a href="<?=base_url()?>">
					<img src="<?=base_url()?>assets/img/logo_color.png" class="img-fluid" width="200px">
				</a>				
			</div>
		</div>
	</div>
	<div id="login-page">
  		<div class="container">
			<form id="formLogin" class="form-login needs-validation" onsubmit="return false" novalidate>
				<h1 hidden>Bienvenido a Tecnimastercol  </h1>
				<h2 class="form-login-heading">Iniciar sesion</h2>
				<div class="login-wrap">        	
	       			<input class="form-control" name="email" placeholder="Ingrese el email" required autofocus>
	       			<div class="invalid-feedback">Por favor ingresar un correo electrónico.</div>
	       			<br>
	       			<input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña" required>
	       			<div class="invalid-feedback">Por favor ingresar una contraseña.</div>
			       	<div class="my-2 text-center">
			       		<a data-toggle="modal" href="#myModal">¿Olvidó su contraseña?</a>
			       	</div>
	       			<button id="login" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> INICIAR SESIÓN</button>
	       			<hr>
	       			<!-- <div class="login-social-link centered">
			          	<p>O inicia sesion con las redes sociales</p>
			          	<button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
			          	<button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
			       	</div>-->
			       	<div class="registration"> ¿No tiene una cuenta?<br/>
			          <a class="" href="#">Crear una cuenta</a>
			       	</div>	      
	  			</div>
	  		</form>

	    	<!-- Modal -->
	    	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
	      		<div class="modal-dialog">
		      		<form id="changePassword" class="needs-validation" onsubmit="return false" novalidate>
		        		<div class="modal-content">
		        			<div class="modal-header">
		          				<h4 class="modal-title">¿Olvidó su contraseña?</h4>
		          				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        			</div>
		        			<div class="modal-body">
		         				<p>Ingrese su email y cambia la contraseña.</p>
		          				<input type="text" name="email1" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" required>
		          				<div class="invalid-feedback">Por favor ingresar un correo electrónico.</div>
		        			</div>
		        			<div class="modal-footer">
		          				<button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
		          				<button class="btn btn-theme" id="sent_change_password" type="button">Guardar</button>
		        			</div>
		        		</div>
		        	</form>
	     		</div>
	   		</div>
	    	<!-- modal -->
  		</div>
	</div>
	<?php $this->load->view('common/admin/js'); ?>
	<script type="text/javascript" src="<?=base_url()?>assets/lib/jquery.backstretch.min.js"></script>
	<script>
  	$.backstretch(base_url+"assets/img/bg-03.jpg", {speed: 500});
	</script>
	<script type="text/javascript">
		
		(function() {
	  	'use strict';
	  	window.addEventListener('load', function() {
	    	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	    	var forms = document.getElementsByClassName('needs-validation');
	    	// Loop over them and prevent submission
	    	var validation = Array.prototype.filter.call(forms, function(form) {
	      	form.addEventListener('submit', function(event) {
        		if (form.checkValidity() === false) {
          		event.preventDefault();
          		event.stopPropagation();
        		}
        		form.classList.add('was-validated');
      		}, false);
	    	});
	  	}, false);
		})();

		$('#login').on('click', function () {
			var bandera=0,
			rta = validateEmail($('[name=email]').val());
			if (rta['bandera']==1) {
				bandera=1;
				return Swal.fire({icon: 'error', title: 'Oops...', text: rta['msj']})
			}
			if ($('[name=password]').val()=='') {
				bandera=1;
				return Swal.fire({icon: 'error', title: 'Oops...', text: 'Debe ingresar una contraseña!'})
			}
			if (bandera==0) {
				ajax('servicios/login',
				{   
				 	email: $("[name=email]").val(),
				 	password: $("[name=password]").val()
				},
				function(data){
				 	if(data.res=="ok"){  
					   Swal.fire({icon: 'success', title: 'Iniciando sesión', showConfirmButton: false,timer: 1500})
					   setTimeout(function(){
					   	if (data.rol=='1') {
					   		window.location.href=base_url+"admin/dashboard";
					   	}else{
					   		window.location.href=base_url+"admin/datosPersonales";
					   	}					     	
					   }, 1500);  
				 	}else{
					   $("#formLogin")[0].reset();
					   return Swal.fire({icon: 'error', title: 'Oops...', text: data.msj})
				 	}
				},10000);
			}
		})

		$('#sent_change_password').on('click', function () {
			var rta = validateEmail($('[name=email1]').val());
			if (rta['bandera']==1) {
				bandera=1;
				return Swal.fire({icon: 'error', title: 'Oops...', text: rta['msj']})
			}else{
				ajax('servicios/sentChangePassword',
				{   
				 	email: $("[name=email1]").val()
				},
				function(data){
				 	if(data.res=="ok"){  
					   Swal.fire({icon: 'success', title: 'Iniciando sesión', showConfirmButton: false, timer: 1500})
					   setTimeout(function(){
					     	window.location.href=base_url+"admin/login";
					   }, 1500);                                           
				 	}else{
					   $("#changePassword")[0].reset();
					   return Swal.fire({icon: 'error', title: 'Oops...', text: data.msj})
				 	}
				},10000);
			}
		})

		function validateEmail(email) {
			var rta=[];
			rta['bandera']=0;
			rta['msj']='';
			if (email=='') {
				rta['bandera']=1;
				rta['msj']='Debe ingresar un correo electrónico!';
			}else{
				if (!validarCorreo(email)) {
					rta['bandera']=1;
					rta['msj']='Debe ingresar un correo electrónico válido!';
				}
			}
			return rta;
		}

	</script>
</body>