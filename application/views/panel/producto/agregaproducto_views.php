
<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Nuevo Producto</h1>	
		<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
		<h6> <b>Tamaño maximo de la imagen 2MB</b></h6>				
	</div>	            
	<?php echo form_open_multipart("registro_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
	<div class="form-wrapper">
		<?php echo form_label('Nombre del producto:', 'nombre'); ?>
		<?php echo form_error('nombre'); ?>
		<?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese nombre del producto', 'autofocus'=>'autofocus','value'=>set_value('nombre')]); ?>
	</div>
	<div class="form-wrapper">
		<?php echo form_label('Precio:', 'precio'); ?>
		<?php echo form_error('precio'); ?>
		<?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Ingrese precio','value'=>set_value('precio')]); ?>
	</div>
	<div class="form-wrapper">
		<?php echo form_label('Descripción:', 'descripcion'); ?>
		<?php echo form_error('descripcion'); ?>
		<?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder' => 'Ingrese descripcion','value'=>set_value('descripcion')]); ?>
	</div>
	<div class="form-wrapper">
		<?php echo form_label('Categoria del Producto:', 'categoria'); ?>
		<?php echo form_error('categoria_id'); ?>
		<?php echo form_input(['name' => 'categoria_id','id' => 'categoria_id','class' => 'form-control','placeholder' => '1- Consolas - 2-PC - 3-Equipos','value'=>set_value('categoria_id')]); ?>
	</div>
	<div class="form-wrapper">
		<?php echo form_label('Imagen:', 'filename'); ?>
		<?php echo form_error('filename'); ?>
		<?php echo form_input(['type' => 'file','name' => 'filename', 'id' => 'filename', 'class' => 'form-control']); ?>
	</div>
	<?php echo form_submit('submit', 'Registrar',"class='btn btn-dark btn-success btn-block'"); ?>
	<?php echo form_close(); ?>
</div>
</div>
</div>
<br><br>
