<div class="col-sm-8 col-md-8">
  <div class="well">
    <h2>CAMBIAR TIPO DE PERFIL DEL USUARIO <?php echo $apellido,' ',$nombre;?></h2>
  </div>
 
 <?php echo form_open("validmodPerfil/$id", ['class' => 'container', 'role' => 'form']); ?>
  <div  style="position: relative;padding: 16px 24px;">
    <?php echo form_error('new_perfil'); ?>
    <?php echo form_label('Tipo de perfil:', 'new_perfil'); ?>
    <?php echo form_input(['name' => 'new_perfil', 'id' => 'new_perfil', 'class' => 'form-control', 'required'=>'required','placeholder' => '1-Administrador/2-Usuario Comun','value'=>set_value('new_perfil')]); ?>
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

<br><br><br><br><br>