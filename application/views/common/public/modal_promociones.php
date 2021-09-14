    <?php if (count($promocion)>0) { ?>
    <div id="registrarmeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content position-relative">
          <div class="modal-body pb-4 pt-5 px-5">
            <button type="button" class="close position-absolute" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="row">
              <div class="col-12 col-lg-5">
                <img src="<?=base_url()?>assets/img/web/img_modal.png" class="position-absolute">
              </div>
              <div class="col-12 col-lg-7">
                <h4><?=$promocion[0]->cabecera?></h4>
                <h3>TecniMasterCol</h3>
                <p><b><?=$promocion[0]->descuento?>%</b> de Descuento en todos los servicios - Descarga el bono de promoción y Llámanos 3183935895</p>
                <p>***Promoción válida del <?=$promocion[0]->vigencia?></p>
                <form id="prom_reg" method="POST" enctype="multipart/form-data" onsubmit="return false" action="<?=base_url()?>servicios/registrarPromocion" class="form-serv mx-0 w-100" novalidate="novalidate" target="_blank">
                  <div class="row">
                   <!-- <div class="col-12 col-lg-6">
                      <div class="form-group mb-1">
                        <label>Marca*</label>
                        <input type="text" class="form-control" onkeypress="return onlyText(event)" placeholder="Digite la marca del aparato" name="marca_promocion" value="" />
                      </div>
                    </div>-->
                    <!--<div class="col-12 col-lg-6">
                      <div class="form-group mb-1">
                        <label>Tipo de aparato*</label>
                        <select class="selectpicker form-control"name="tipo_aparatos_promo">
                          <option value="Escoge el tipo de aparato" style="display: none">Escoge el tipo de aparato</option>
                          <?php foreach ($aparatos as $k_a => $v_a) { ?>
                            <option value="<?=$v_a->id_tipo_aparato?>"><?=$v_a->tipo?></option>
                          <?php } ?>                                                       
                        </select>
                      </div>
                    </div>-->
                    <div class="col-12 col-lg-6">
                      <div class="form-group mb-1">
                        <label>Nombres*</label>
                        <input type="text" class="form-control" onkeypress="return onlyText(event)" placeholder="Ingrese sus nombres" name="nombre_cliente_promo" value="" />
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="form-group mb-1">
                        <label>Apellidos*</label>
                        <input type="text" class="form-control" onkeypress="return onlyText(event)" placeholder="Ingrese sus apellidos" name="apellidos_cliente_promo" value="" />
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">                      
                      <div class="form-group mb-1">
                        <label>Correo electrónico*</label>
                        <input type="email" id="email" class="form-control"  name="email_promo" placeholder="Ingrese su  Email"/>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">                      
                      <div class="form-group mb-1">
                        <label>Celular*</label>
                        <input type="text" class="form-control" onkeypress="return onlyNumber(event)" placeholder="Digite su número de contacto" name="celular_promo" value="" />
                      </div>
                    </div>
                   <!-- <div class="col-12 col-lg-6">
                      <div class="form-group mb-1">
                        <label>Dirección</label>
                        <input type="text" placeholder="Ingrese la dirección" class="form-control" name="direccion_promo">
                      </div>
                    </div>-->
                    <div class="col-12 col-lg-6 d-flex align-items-center">
                      <div class="form-group my-auto">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Acepto los términos y condiciones de tratamiento de datos*</label>
                          <a href="<?=base_url()?>documentos/politica.pdf" style="color:black;font-size:12px;" target="_blanck">Ver condiciones de tratamiento de datos</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group btn-precio mt-2">
                          <input type="submit" class="btnSubmit btn-block btn-primary" onclick="registrar_promocion()" value="Descargar MI BONO (Aquí)" />
                          <p class="small mt-3">**Aplican condiciones y restricciones</p>
                      </div>
                    </div>                      
                  </div>                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>