<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Modificar Datos</h1>	
		<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
		<h6> <b>Tamaño maximo de la imagen 2MB</b></h6>		
	</div>	            

	<?php echo form_open_multipart("producto_up/$id", ['class' => 'form-signin', 'role' => 'form']); ?>
		<div class="form-wrapper">
			<?php echo form_label('Nombre del producto:', 'nombre'); ?>
			<?php echo form_error('nombre'); ?>
			<?php echo form_input(['name' => 'nombre', 'id' => 'nombre','value'=>"$nombre", 'class' => 'form-control','placeholder' => 'Ingrese nombre del producto', 'autofocus'=>'autofocus']); ?>
		</div>
		<div class="form-wrapper">
			<?php echo form_label('Descripción:', 'descripcion'); ?>
			<?php echo form_error('descripcion'); ?>
			<?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion','value'=>"$descripcion", 'class' => 'form-control','placeholder' => 'Ingrese descripción', 'autofocus' => 'autofocus']); ?>
		</div>

		<div class="form-wrapper">
			<?php echo form_label('Tipo Producto:', 'tipoP'); ?>
			<?php echo form_error('tipoP'); ?>
			<?php echo form_input(['name' => 'tipoP', 'id' => 'tipoP','value'=>"$tipo_id", 'class' => 'form-control','placeholder' => '1-Regular - 2-Destacado', 'autofocus' => 'autofocus']); ?>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-wrapper">
					<?php echo form_label('Precio:', 'precio'); ?>
					<?php echo form_error('precio'); ?>
					<?php echo form_input(['name' => 'precio', 'id' => 'precio','value'=>"$precio", 'class' => 'form-control','placeholder' => 'Ingrese precio','autofocus' => 'autofocus']); ?>
				</div>
			</div>
		</div>

		<div class="form-wrapper">
			<?php echo form_label('Categoria:', 'categoria_id'); ?>
			<?php echo form_error('categoria_id'); ?>
			<?php echo form_input(['name' => 'categoria_id','id' => 'categoria_id','value'=>"$categoria_id" ,'class' => 'form-control','placeholder' => '1-Consola - 2-PC - 3-Equipos', 'autofocus' => 'autofocus']); ?>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-wrapper">
					<?php echo form_label('Imagen actual:', 'img_ac'); ?>
					<img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="<?php  echo base_url($imagen); ?>" >
				</div>	
			</div>
		</div>
		<div class="form-wrapper">
			<?php echo form_label('Imagen:', 'imagen'); ?>
			<?php echo form_input(['type' => 'file','name' => 'filename', 'id' => 'filename', 'class' => 'form-control']); ?>
			<?php echo form_error('filename'); ?>
			<br>
			</div>
	<?php echo form_submit('submit', 'Modificar',"class='btn btn-dark btn-success btn-block'"); ?>
	<?php echo form_close(); ?>
</div>
</div>
</div>
<br><br>