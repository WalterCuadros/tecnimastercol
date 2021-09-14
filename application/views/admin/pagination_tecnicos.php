<table class="table table-striped table-hover txt-light " id="tespec">
	<thead>
	    <tr>
	        <th class="text-center">Nombre</th>
	        <th class="text-center">Cantidad Servicios</th>
	        <th class="text-center">Total Servicios</th>
			<th class="text-center">Aparatos</th>
			<th class="text-center">Total</th>
			<th class="text-center">Acciones</th>   
	    </tr>
	</thead>
	<tbody>
		<?php
			if (count($tecnicos)>0 ) {
			foreach ($tecnicos as $key => $e) { ?>
			<tr class="text-center">
				<td class="text-center" <?=(count($e->aparatos)>0)?'rowspan="'.count($e->aparatos).'"':'' ?>><?=$e->nombres." ".$e->apellidos ?></td>
				<td class="text-center" <?=(count($e->aparatos)>0)?'rowspan="'.count($e->aparatos).'"':'' ?>><?=$e->total_servicios ?></td>
				<td class="text-center" <?=(count($e->aparatos)>0)?'rowspan="'.count($e->aparatos).'"':'' ?>>$<?=$e->valor ?></td>
				<?php if (count($e->aparatos)>0) { 
				foreach ($e->aparatos as $k_a => $a) { ?>
				 	<td class="text-center"><?=$a->tipo." (".$a->total.")" ?></td>
					<td class="text-center">$<?=$a->valor ?></td>
					<?php if (count($e->aparatos)>=1 && $k_a==0) { ?>
						<td class="text-center" <?=(count($e->aparatos)>1) ? 'rowspan="'.count($e->aparatos).'"':''?>><a href="<?=base_url()?>admin/viewTecnico/<?=$e->id_tecnico;?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
					<?php } ?>					
			</tr>
		<?php }}}}else{ ?>
			<tr class="text-center">
				<td colspan="6">No hay solicitudes de tecnicos</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="col-12 d-flex justify-content-center" style="font-size: 13px;">
    <nav aria-label="Page navigation" id="pagination-digg1">
    	<?=$this->pagination->create_links(); ?>
  	</nav>
</div>