<div class="col-sm-8 col-md-8">
	<?php if (!$productos) { ?>

		<div class="container">
			<div class="well">
				<h1>No hay Productos</h1>
			</div>
			<a type="button" class="btn btn-success" href="<?php echo base_url('form_inse_p'); ?>">Agregar</a>
			<br><br>
		</div>
	<?php } else { ?>

	<div class="container">
		<div class="well">
			<h1>Todos los Productos activos</h1>
		</div>	
		<a type="button" class="btn btn-success" href="<?php echo base_url('form_inse_p'); ?>">Agregar</a>
		<br> <br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>Precio</th>
					<th>Tipo</th>
					<th>Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos->result() as $row){ ?>
				<tr>
					<td><?php echo $row->id;  ?></td>
					<td><?php echo $row->nombre;  ?></td>
					<td><?php echo $row->descripcion;  ?></td>
					<td><?php echo $row->categoria_id;  ?></td>
					<td><?php echo $row->precio;  ?></td>
					<td><?php if($row->tipo_id == "1"){
						echo "Regular";
					}else{
						echo "Destacado";
					} ?></td>
					<td><a href="<?php echo base_url("producto_edit/$row->id");?>">Modificar</a>|<a href="<?php echo base_url("remove_producto/$row->id");?>">Eliminar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>
</div>
</div>
</div>