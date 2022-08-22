<style>
footer{
    position:absolute;
    width: 100%;
  }
  </style>

<br><br>
<div class="container" style="width: 40%">
  <div style="border-top: 2px solid #f90000; position: relative; text-align: center; border-bottom: 1px solid #c2c8cc;">
    <h2>CAMBIAR MI DIRECCION DE CORREO ELECTRONICO</h2>
  </div>

 <?php echo form_open("verificoEmail", ['class' => 'container', 'role' => 'form']); ?>
 <div class="mc-Container mc-block-profil">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Tu correo electrónico actual:</strong>
    <span><?php echo ($email) ?></span>
  </div>
 <div class="mc-Container mc-block-profil">
    <?php echo form_error('new_email'); ?>
    <?php echo form_label('Nueva dirección de correo electrónico:', 'new_email'); ?>
    <?php echo form_input(['type' => 'email','name' => 'new_email', 'id' => 'new_email', 'class' => 'form-control', 'required'=>'required','placeholder' => 'Nueva dirección de correo electrónico','value'=>set_value('new_email')]); ?>
  </div>
  <div style="position: relative; padding-top: 24px; padding-bottom: 24px">
    <?php echo form_error('confirm_email'); ?>
    <?php echo form_label('Confirma tu nueva dirección de correo electrónico:', 'confirm_email'); ?>
    <?php echo form_input(['type' => 'email','name' => 'confirm_email', 'id' => 'confirm_email', 'required'=>'required', 'class' => 'form-control','placeholder' => 'Confirma tu nueva dirección de correo electrónico','value'=>set_value('confirm_email')]); ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <?php echo form_submit('submit', 'Modificar',"class='btn btn-dark btn-success btn-block'"); ?>
      </div>
      <div class="col-lg-6">
        <a class="btn btn-sm btn-default" href="<?php echo base_url('MiCuenta');?>">Cancelar</a>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>

</div>
<br><br><br><br><br>