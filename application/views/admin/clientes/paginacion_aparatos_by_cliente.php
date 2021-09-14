                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-sm text-center">
                            <thead class="cf">
                              <tr>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Serial</th>
                                <th>Total servicios</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if (count($aparatos)>0) {
                                foreach ($aparatos as $k_s => $v_s) { ?>
                              <tr>
                                <td data-title="Tipo"><?=$v_s->tipo_aparato?></td>
                                <td data-title="Marca"><?=$v_s->marca?></td>
                                <td data-title="Modelo"><?=$v_s->modelo?></td>
                                <td data-title="Serial"><?=$v_s->serial?></td>
                                <td data-title="Serial"><?=$v_s->total?></td>
                                <td data-title="Acciones">
                                  <?php if ($this->session->userdata('rol')!='2') { ?>
                                  <button type="button" class="btn btn-warning edit-aparato" data-id="<?=$v_s->id?>" data-marca="<?=$v_s->marca?>" data-modelo="<?=$v_s->modelo?>" data-serial="<?=$v_s->serial?>" data-toggle="modal" data-target="#editarAparatoModal"><i class="fa fa-pencil"></i></button>
                                  <?php } ?>                                   
                                  <button type="button" class="btn btn-warning view-aparato ml-1" data-id="<?=$v_s->id?>"><i class="fa fa-list-alt"></i></button>
                                </td>
                              </tr>
                                <?php } }else { ?>
                              <tr>
                                <td colspan="5">No tiene aparatos registrados</td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center">
                          <nav aria-label="Page navigation" id="pagination-digg2">
                            <?=$this->pagination->create_links(); ?>
                          </nav>
                        </div>