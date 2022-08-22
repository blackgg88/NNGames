<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">

      <?php echo form_open("registrarse", ['class' => 'login100-form validate-form', 'role' => 'form']); ?>
      <span class="login100-form-title p-b-40" style="margin-top: -250px">
        Crear Cuenta
      </span>
      <div class="form-group" style="margin-top: -100px">
        <div class="form-wrapper">
          <?php echo form_error('nombre'); ?>
          <?php echo form_input(['name' => 'nombre',
          'id' => 'nombre',
          'class' => 'form-control',
          'placeholder' => 'Nombre',
          'autofocus'=>'autofocus',
          'required'=>'required',
          'value'=>set_value('nombre')]); ?>
        </div>
        <div class="form-wrapper">
          <?php echo form_error('apellido'); ?>
          <?php echo form_input(['name' => 'apellido',
          'id' => 'apellido',
          'class' => 'form-control',
          'placeholder' => 'Apellido',
          'required'=>'required',
          'value'=>set_value('apellido')]); ?>
        </div>
      </div>

      <div class="form-wrapper" style="width: 100%; margin-top: -40px">
        <?php echo form_error('email'); ?>
        <?php echo form_input(['type' => 'email',
        'name' => 'email',
        'id' => 'email',
        'class' => 'form-control',
        'placeholder' => 'Email',
        'required'=>'required',
        'value'=>set_value('email')]); ?>
      </div>

      <div class="form-wrapper" style="width: 100%">
        <?php echo form_error('username'); ?>
        <?php echo form_input(['name' => 'username',
        'id' => 'username',
        'class' => 'form-control',
        'placeholder' => 'Nombre de usuario',
        'required'=>'required',
        'value'=>set_value('username')]); ?>
      </div>

      <div class="form-group">
        <div class="form-wrapper">
          <?php echo form_error('password'); ?>
          <?php echo form_password(['name' => 'password',
          'id' => 'password',
          'class' => 'form-control',
          'placeholder' => 'Contraseña',
          'required'=>'required',
          'value'=>set_value('password')]); ?>
        </div>
        <div class="form-wrapper">
          <?php echo form_error('confirm_password'); ?>
          <?php echo form_password(['name' => 'confirm_password',
          'id' => 'confirm_password',
          'required'=>'required',
          'class' => 'form-control',
          'placeholder' => 'Confirmacion de contraseña',
          'value'=>set_value('confirm_password')]); ?>
        </div>
      </div>
      <?php echo form_submit('agregar', 'Registrarse',"class='btn btn-dark btn-success btn-block'"); ?>
      <div class="w-full text-center p-t-70">
        <a href="<?php echo base_url('login');?>">
            Ya tengo una cuenta
        </a>
      </div>
      <?php echo form_close(); ?>
      <div class="login100-more" style="background-image: url('assets/img/58.jpg');"></div>
    </div>
  </div>
</div>