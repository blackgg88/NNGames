
<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Todas las ventas</h1>
	</div>	
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>N°</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Total</th>
				<th>Detalle</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($ventas->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id;  ?></td>
				<td><?php echo $row->fecha;  ?></td>
				<td><?php echo $row->nombre, ' ', $row->apellido;?></td>
				<td><?php echo $row->total;  ?></td>
				<td><a href="<?php echo base_url("vista_detalle/$row->id");?>">Ver detalle</a>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<div>
		
	</div>
</div>
</div>
</div>