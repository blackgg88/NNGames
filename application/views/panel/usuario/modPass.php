
<div class="col-sm-8 col-md-8">
  <div class="well">
    <h2>CAMBIAR CONTRASEÑA DEL USUARIO <?php echo $apellido ,' ', $nombre ;?></h2>
  </div>
 
 <?php echo form_open("validmodPassword/$id", ['class' => 'container', 'role' => 'form']); ?>
  <div  style="position: relative;padding: 16px 24px;border-bottom: 1px solid #c2c8cc;">
    <?php echo form_error('new_password'); ?>
    <?php echo form_label('Nueva contraseña:', 'new_password'); ?>
    <?php echo form_password(['name' => 'new_password', 'id' => 'new_password', 'class' => 'form-control', 'required'=>'required','placeholder' => 'Nueva contraseña','value'=>set_value('new_password')]); ?>
  </div>
  <div style="position: relative;padding: 16px 24px;">
    <?php echo form_error('confirm_password'); ?>
    <?php echo form_label('Confirme nueva contraseña:', 'confirm_password'); ?>
    <?php echo form_password(['name' => 'confirm_password', 'id' => 'confirm_password', 'required'=>'required', 'class' => 'form-control','placeholder' => 'Reingrese contraseña','value'=>set_value('confirm_password')]); ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <?php echo form_submit('submit', 'Modificar',"class='btn btn-dark btn-success btn-block'"); ?>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>

</div>
</div>
</div>