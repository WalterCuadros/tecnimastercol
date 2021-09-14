<!DOCTYPE html>
<html lang="en">
<head><meta charset="big5">
       
  <title>Blog Servicios técnicos | Tecnimastercol</title>
  <meta name="description" content="Encuentra todo lo que necesitas saber sobre el cuidado y servicio técnico Tecnimastercol" />  
    <?php $this->load->view("common/public/head"); ?>
  </head>
  <body id="blog" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
      <div itemscope itemtype = "http://schema.org/LocalBusiness" >

        <?php $this->load->view("common/public/navbar")?>

        <div class="intro-section site-blocks-cover innerpage" style="background-image: url('<?php echo base_url(); ?>assets/img/web/header_blog.png');">
          <div class="container">
            <div class="row align-items-center text-center">
              <div class="col-lg-12 text-center" data-aos="fade-up">
                <h1>Nuestro Blog TecniMasterCol</h1>
                <p class="text-white">Más cerca de tu hogar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END slider --> 

        <div class="site-section">
          <div class="container">
            <div class="row">
            <?php foreach ($posts as $key => $post) { ?>
              <div class="col-md-6 mb-5 mb-lg-5 col-lg-4">
                <div class="card">
                  <div class="card-header p-0">
                    <a href="https://tecnimasterbucaramanga.blogspot.com/2019/11/por-que-realizar-el-mantenimiento.html" class="img-link">
                      <img src="<?php echo base_url(); ?>assets/img/blog/<?php echo $post->imagen ?>" alt="Servicio técnico lavadoras neveras aires acondicionados a domicilio" class="img-fluid w-100">
                    </a>
                  </div>
                  <div class="card-body">
                    <a href="https://tecnimasterbucaramanga.blogspot.com/2019/11/por-que-realizar-el-mantenimiento.html">
                    
                      <h5><?php echo $post->titulo?></h5>
                    </a>
                    <div class="meta">blog TECNIMASTER</div>
                  </div>
                  <div class="card-footer">
                    <a href="<?=base_url()?>web/blog_individual/<?=$post->id?>" target="_blank">LEER TODO</a> 
                    <!--<a href="https://tecnimasterbucaramanga.blogspot.com/2019/11/por-que-realizar-el-mantenimiento.html">LEER TODO</a>-->
                  </div>
                </div>
              </div>  
            <?php } ?>         
            </div>
          </div>
        </div>

        <!-- <div class="py-5 bg-primary block-12 ">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12" style="text-align: center;">
                <a href="<?php echo base_url().'welcome/index'?>#servicios"><h3 class="text-white">Conoce nuestros precios y agenda tu servicio AQUI</h3></a>
              </div>
            </div>
          </div>
        </div> -->

        <div id="promociones_box">
        <div class="container pt-5">
          <div class="row">
            <div class="col-12 text-center">
              <h3 class="label-white">Contáctanos y solicita tu servicio. </h3>
              <p class="label-white">Nuestro compromiso es ser su solución  3183935895.</p>
             <!--  <button class="btn btn-primary my-4" data-toggle="modal" data-target="#registrarmeModal">Registrar</button> -->
             <a class="btn btn-primary my-4" href="tel:+573183935895">Llámanos</a>
            </div>
          </div>
        </div>
      </div>
    
    <!-- END block-2 -->
    <?php  
    if (count($promocion)>0) {
      $this->load->view("common/public/modal_promociones");
    }else{
      $this->load->view("common/public/modal_registro");
    }
    $this->load->view("common/public/modal_servicio");
    $this->load->view("common/public/footer");
    $this->load->view("common/public/js"); ?>
  </body>
</html>