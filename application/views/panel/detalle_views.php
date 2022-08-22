
<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Detalle venta</h1>
	</div>	
	<a type="button" class="btn btn-success" href="<?php echo base_url('listado_ventas'); ?>">Volver</a>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>N° Compra</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Direccion de envio</th>
				<th>Ciudad</th>
				<th>Provincia</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($venta->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id;  ?></td>
				<td><?php echo $row->fecha;  ?></td>
				<td><?php echo $row->nombre, ' ', $row->apellido;?></td>
				<td><?php echo $row->direccion;  ?></td>
				<td><?php echo $row->ciudad;  ?></td>
				<td><?php echo $row->provincia;  ?></td>
				<td><?php echo $row->total;  ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($detalles->result() as $row){ ?>
			<tr>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->cantidad;  ?></td>
				<td><?php echo $row->subtotal;  ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
	<div>
		
	</div>
</div>
</div>
</div>