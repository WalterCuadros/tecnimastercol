<!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?=base_url()?>assets/img/<?=(!empty($this->session->userdata('url')))?'clientes/'.$this->session->userdata('url'):'default-avatar.png'?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?=$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')?></h5>
          <?php if ($this->session->userdata('rol')=='1') { ?>
            <li class="mt">
              <a class="<?=($sidebar=='dashboard')?'active':''?>" href="<?=base_url()?>admin/dashboard">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="mt">
              <a class="<?=($sidebar=='usuario')?'active':''?>" href="<?=base_url()?>admin/usuario">
                <i class="fa fa-user-circle-o "></i>
                <span>Usuario</span>
                </a>
            </li>
            <li class="mt">
              <a class="<?=($sidebar=='solicitudes')?'active':''?>" href="<?=base_url()?>admin/solicitudes">
                <i class="fa fa-list-alt"></i>
                <span>Solicitudes</span>
                </a>
            </li>
            
            <li class="sub-menu">
              <a class="<?=($sidebar=='promociones')?'active':''?>" href="javascript:;">
                <i class="fa fa-percent"></i>
                <span>Promociones</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url()?>admin/solicitud_promociones"><i class="fa fa-list-alt"></i>Solicitantes</a></li>
                <li><a href="<?=base_url()?>admin/promociones"><i class="fa fa-plus"></i>Promociones</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a class="<?=($sidebar=='Blog')?'active':''?>" href="javascript:;">
                <i class="fa fa-bookmark"></i>
                <span>BLOG</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url()?>admin/posts"><i class="fa fa-plus"></i>Posts</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a class="<?=($sidebar=='tecnicos')?'active':''?>" href="javascript:;">
                <i class="fa fa-briefcase"></i>
                <span>Técnicos</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url()?>admin/tecnicos"><i class="fa fa-list-alt"></i>General</a></li>
                <li><a href="<?=base_url()?>admin/newTecnico"><i class="fa fa-plus"></i>Nuevo</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a class="<?=($sidebar=='clientes')?'active':''?>" href="javascript:;">
                <i class="fa fa-users"></i>
                <span>Clientes</span>
                </a>
              <ul class="sub">
                <li><a href="<?=base_url()?>admin/clientes"><i class="fa fa-list-alt"></i>General</a></li>
                <li><a href="<?=base_url()?>admin/newCliente"><i class="fa fa-plus"></i>Nuevo</a></li>
              </ul>
            </li>  
          <?php } ?>
          <?php if ($this->session->userdata('rol')=='2') { ?>
            <li class="mt">
              <a class="<?=($sidebar=='datos_personales')?'active':''?>" href="<?=base_url()?>admin/datosPersonales">
                <i class="fa fa-user"></i>
                <span>Datos personales</span>
                </a>
            </li>
          <?php } ?>     
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->