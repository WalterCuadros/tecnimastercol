<table class="table table-striped table-hover txt-light " id="tespec">
	<thead>
	    <tr>
	        <th class="text-center">Nombre cliente</th>
	        <th class="text-center">Tipo aparato</th>
	        <th class="text-center">Nombre Técnico</th>
	        <th class="text-center">Valor cliente</th>
	        <th class="text-center">Valor Técnico</th>
	        <th class="text-center">Orden servicio</th>
	        <th class="text-center">Fecha</th>
			<th class="text-center">Acciones</th>   
	    </tr>
	</thead>
	<tbody>
		<?php
			if (count($servicios)>0 ) {
			foreach ($servicios as $key => $e) { ?>
			<tr class="text-center">
				<td><?=$e->nombre_cliente." ".$e->apellido_cliente?></td>
				<td><?=$e->tipo_aparato?></td>
				<td><?=$e->nombre_tecnico." ".$e->apellido_tecnico?></td>
				<td>$<?=number_format($e->valor,0,'','.')?></td>
				<td>$<?=number_format($e->valor_tecnico,0,'','.')?></td>
				<td><?=$e->clave_servicio?></td>
				<td><?=$e->fecha?></td>
				<td>
					<form action="<?=base_url()?>admin/viewCliente/<?=$e->id_usuario?>" method="POST">
						<input type="hidden" name="id_servicio" value="<?=$e->id?>">
						<input type="hidden" name="id_tipo_aparato" value="<?=$e->id_aparato?>">
						<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
					</form>
					
				</td>
			</tr>
		<?php }}else{ ?>
			<tr class="text-center">
				<td colspan="8">No hay solicitudes de servicios</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="col-12 d-flex justify-content-center" style="font-size: 13px;">
    <nav aria-label="Page navigation" id="pagination-digg_servicios">
    	<?=$this->pagination->create_links(); ?>
  	</nav>
</div>