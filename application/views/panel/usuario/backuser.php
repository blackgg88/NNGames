
<br><br><br>

<div class="container" style="width: 40%">
  <div style="border-top: 2px solid #f90000; position: relative; text-align: center; border-bottom: 1px solid #c2c8cc;">
    <h2>MI CUENTA</h2>
  </div>
 
  <div class="mc-Container mc-block-profil">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Nombre:</strong>
    <span><?php echo ($nombre) ?></span>
  </div>
  <div class="mc-Container mc-block-profil">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Apellido:</strong>
    <span><?php echo ($apellido) ?></span>
  </div>
  <div class="mc-Container mc-block-profil">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Usuario:</strong>
    <span><?php echo ($username) ?></span>
  </div>

  <a class="mc-Container mc-block-profil" href="<?php echo base_url('editar_pass');?>">
    <div style="background-image: url(assets/img/edit-forms.png);
    background-position: right;
    background-repeat: no-repeat;
    background-size: contain;
    ">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Contraseña:</strong>
    <span>********</span>
  </div>
  </a>

  <a class="mc-Container mc-block-profil" href="<?php echo base_url('editar_correo');?>">
    <div style="background-image: url(assets/img/edit-forms.png);
    background-position: right;
    background-repeat: no-repeat;
    background-size: contain;
    ">
    <strong style="margin-right: 35px;color: #000;vertical-align: middle;">Correo electrónico:</strong>
    <span><?php echo ($email) ?></span>
  </div>
  </a>


</div>
<br><br><br><br><br>