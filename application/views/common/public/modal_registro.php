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
                <h4>REGÍSTRATE CON</h4>
                <h3>TecniMasterCol</h3>
                <p>Para obtener descuentos y beneficios</p>
                <form method="POST"  onsubmit="return false" class="form-serv mx-0 w-100">
                  <div class="row">
                    <div class="col-12 col-lg-6">
                      <div class="form-group">
                        <label>Tipo de servicio*</label>
                        <select class="selectpicker form-control"name="tipo_servicio">
                          <option value="Escoger servicio" style="display: none">Escoger sevicio</option>
                          <option value="Revisión técnica">Revisión técnica</option>
                          <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>                                
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Marca*</label>
                        <input type="text" class="form-control" onkeypress="return onlyText(event)" placeholder="Digite la marca del aparato" name="marca_aparato" value="" />
                      </div>
                      <div class="form-group">
                        <label>Tipo de aparato</label>
                        <select class="selectpicker form-control"name="tipo_aparato">
                          <option value="Escoge el tipo de aparato" style="display: none">Escoge el tipo de aparato</option>
                          <?php foreach ($aparatos as $k_a => $v_a) { ?>
                            <option value="<?=$v_a->id_tipo_aparato?>"><?=$v_a->tipo?></option>
                          <?php } ?>                                                       
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="form-group">
                        <label>Nombre*</label>
                        <input type="text" class="form-control"onkeypress="return onlyText(event)" placeholder="Ingrese su nombre" name="nombre_cliente" value="" />
                      </div>
                      <div class="form-group">
                        <label>Correo electrónico*</label>
                        <input type="email" id="email" class="form-control"  name="email" placeholder="Ingrese su  Email"/>
                      </div>
                      <div class="form-group">
                        <label>Celular*</label>
                        <input type="text" class="form-control" onkeypress="return onlyNumber(event)" placeholder="Digite su número de contacto" name="numero_contacto" value="" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group btn-precio mt-2">
                          <input type="submit" class="btnSubmit btn-block btn-primary" onclick="solicitar_precio('1')" value="Ver precio" />
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