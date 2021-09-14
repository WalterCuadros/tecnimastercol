<!DOCTYPE html>
<html lang="en">
<head><meta charset="big5">
       
  <title><?= $post_individual[0]->seo ?></title>
  <meta name="description" content="<?= $post_individual[0]->description ?>" />  
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
                <h3>TecniMasterCol</h3>
                <p class="text-white">Más cerca de tu hogar</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END slider --> 

        <div class="site-section">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-12 " >
                <h1><?php echo $post_individual[0]->titulo  ?> </h1>    
                <h6>Fecha de publicación: <?php echo $post_individual[0]->fecha ?> </h6>   
              </div>
              <div class="col-6 col-lg-6" style="margin-left:auto;margin-right:auto;">
                <?php if($post_individual[0]->video ==""){?>
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/blog/<?php echo $post_individual[0]->imagen ?>" alt="Servicio técnico lavadoras neveras aires acondicionados a domicilio" class="img-fluid w-100">
                <?php }else{ ?> 
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $post_individual[0]->video?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } ?>
              </div>
              <div class="col-8 col-lg-8" style="margin-top:1.3vw;margin-left:auto;margin-right:auto;" >
                <p> <?php echo nl2br($post_individual[0]->content) ?></p>
              </div>
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