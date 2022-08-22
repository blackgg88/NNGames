
<div class="col-sm-8 col-md-8">
	<div class="well">
		<h1>Nuevo Usuario</h1>					
	</div>	            
      <?php echo form_open("usuario_controller/agregarUs", ['class' => 'form', 'role' => 'form']); ?>
          <div class="form-wrapper">
            <?php echo form_error('nombre'); ?>
            <?php echo form_label('Nombre', 'nombre'); ?>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus'=>'autofocus', 'required'=>'required','value'=>set_value('nombre')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('apellido'); ?>
            <?php echo form_label('Apellido', 'apellido'); ?>
            <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control', 'required'=>'required','value'=>set_value('apellido')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('email'); ?>
            <?php echo form_label('Email', 'email'); ?>
            <?php echo form_input(['type' => 'email','name' => 'email', 'id' => 'email', 'class' => 'form-control', 'required'=>'required','value'=>set_value('email')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('perfil'); ?>
            <?php echo form_label('Tipo de perfil', 'perfil_id'); ?>
            <?php echo form_input(['name' => 'perfil_id','id' => 'perfil_id', 'class' => 'form-control','placeholder' => '1-Administrador/2-Usuario comun', 'required'=>'required','value'=>set_value('username')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('username'); ?>
            <?php echo form_label('Nombre de usuario', 'username'); ?>
            <?php echo form_input(['name' => 'username','id' => 'username', 'class' => 'form-control', 'required'=>'required','value'=>set_value('username')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('password'); ?>
            <?php echo form_label('Ingrese contraseña', 'password'); ?>
            <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'required'=>'required','value'=>set_value('password')]); ?>
          </div>
          <div class="form-wrapper">
            <?php echo form_error('confirm_password'); ?>
            <?php echo form_label('Reingrese contraseña', 'confirm_password'); ?>
            <?php echo form_password(['name' => 'confirm_password', 'id' => 'confirm_password', 'required'=>'required', 'class' => 'form-control','value'=>set_value('confirm_password')]); ?>
          </div>
          <br>
          <?php echo form_submit('agregar', 'Crear usuario',"class='btn btn-dark btn-success btn-block''"); ?>
          <?php echo form_close(); ?><br>
</div>
</div>
</div>