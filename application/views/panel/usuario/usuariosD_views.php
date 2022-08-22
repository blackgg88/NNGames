<div class="col-sm-8 col-md-8">
<?php if (!$usuarios) { ?>

  <div class="container">
    <div class="well">
      <h1>No hay Eliminados</h1>
    </div>  
  </div>

  <?php } else { ?>

<div class="col-sm-8 col-md-8">
  <div class="well">
    <h1>Productos eliminados</h1>
  </div>  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>N°</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>Activar</th>
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
        <td><a href="<?php echo base_url("activar_usuario/$row->id");?>">Activar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>
</div>
</div>
</div>
