                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-sm text-center">
                            <thead class="cf">
                              <tr>
                                <th>Cliente</th>
                                <th>Aparato</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if (count($servicios)>0) {
                                foreach ($servicios as $k_s => $v_s) { ?>
                              <tr>
                                <td data-title="Cliente"><?=$v_s->name_cliente?></td>
                                <td data-title="Aparato"><?=$v_s->tipo_aparato?></td>
                                <td data-title="Valor">$<?=number_format($v_s->valor, 0, '', '.')?></td>
                                <td data-title="Fecha"><?=$v_s->fecha?></td>
                                <td data-title="Acciones">
                                  <button type="button" class="btn btn-warning view-servicio" data-id="<?=$v_s->id?>" data-valor="$<?=number_format($v_s->valor, 0, '', '.')?>" data-aparato="<?=$v_s->tipo_aparato?>" data-fecha="<?=$v_s->fecha?>"><i class="fa fa-list-alt"></i></a>
                                </td>
                              </tr>
                                <?php } }else { ?>
                              <tr>
                                <td colspan="5">No tiene servicios registrados</td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="d-flex justify-content-center">
                          <nav aria-label="Page navigation" id="pagination-digg1">
                            <?=$this->pagination->create_links(); ?>
                          </nav>
                        </div>