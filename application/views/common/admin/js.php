  <!-- js placed at the end of the document so the pages load faster -->
  <script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!--<script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/lib/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url(); ?>assets/lib/common-scripts.js"></script>

	<script src="<?php echo base_url();?>assets/js/sweetalert2.js"></script>
	<script src="<?php echo base_url();?>assets/js/scripts.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.plugins.js"></script>
	<script type="text/javascript">
		$('.logout').on('click', function () {
			ajax('servicios/logout',
				{   
				},
				function(data){
				 	if(data.res=="ok"){  
					  window.location.href=base_url+"web/login";                                         
				 	}else{
					   $("#changePassword")[0].reset();
					   return Swal.fire({icon: 'error', title: 'Oops...', text: data.msj})
				 	}
				},10000);
		})
	</script>