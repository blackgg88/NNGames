<style type="text/css">
	footer{
		position: absolute;
		width: 100%;
	}
</style>

<div class="col-sm-8 col-md-8">

	<?php if(!$consultas) {?>

	<div class="well">
		<h1>No hay consultas</h1>
	</div>
	
	<?php } else {?>

	<div class="well">
		<h1>Consultas</h1>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Asunto</th>
				<th>Mensaje</th>
				<th>Leido</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($consultas->result() as $row){ ?>
			<tr>
				<td><?php echo $row->id;  ?></td>
				<td><?php echo $row->nombre;  ?></td>
				<td><?php echo $row->email;  ?></td>
				<td><?php echo $row->asunto;  ?></td>
				<td><?php echo $row->mensaje;  ?></td>

				<td><?php if ($row->leido == "1"){ ?>
					<a href="<?php echo base_url("noleer/$row->id");?>">
						<div><img style="height: 50px; width: 50px" src="assets/img/59-128.png"></div>
					</a>
					<?php } else {?>
					<a href="<?php echo base_url("leer/$row->id");?>">
						<div><img style="height: 50px; width: 50px" src="assets/img/icon-1332774_960_720.png"></div>
					</a>
					<?php } ?>
				</td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php }?>	            
</div>
</div>
</div>