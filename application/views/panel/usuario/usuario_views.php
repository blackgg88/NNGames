<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Todos los Usuarios</h1>
	</div>	
	<!-- <a type="button" class="btn btn-success" href="<?php echo base_url("nuevo_usuario"); ?>">Agregar</a>-->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->apellido;  ?></td>
				<td><?php echo $row->username;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php if ($row->perfil_id == "1"){
					echo 'administrador';
				}else{
					echo 'Usuario Comun';
				} ?></td>
				
				<td><a href="<?php echo base_url("modPerfil/$row->id");?>">Tipo Perfil</a>						
					<!--<a href="<?php echo base_url("modContrasena/$row->id");?>"><?php if ($row->perfil_id!=1){echo "|Contraseña";}?></a>-->
				</td>
				<td><a href="<?php echo base_url("eliminar_usuario/$row->id");?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	            
</div>
</div>
</div>