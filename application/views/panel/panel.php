<br>
<div class="container" style="margin-top: 15px">
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="form-wrapper">
          
          <div class="card" style="background-color: #EAEAEA">
            <button class="accordion" style="background-color: #EAEAEA">Productos</button>
            <div class="panel">
              <table class="table">
                <tr>
                  <td>
                    <a href="<?php echo base_url("productos");?>">Activos</a>
                  </td>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('producto_disabled'); ?>">Eliminados</a>
                    </td>
                  </tr>
                </tr>
              </table>
            </div>
          </div>

          <div class="card" style="background-color: #EAEAEA">
            <button class="accordion" style="background-color: #EAEAEA">Reportes</button>
            <div class="panel">
              <table class="table">
                <tr>
                  <td>
                    <a href="<?php echo base_url('listado_ventas');?>">Ventas</a>
                  </td>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('listado_consultas');?>">Consultas</a>
                    </td>
                  </tr>
                </tr>
              </table>
            </div>
          </div>
          
          <div class="card" style="background-color: #EAEAEA">
            <button class="accordion" style="background-color: #EAEAEA">Usuarios</button>
            <div class="panel">
              <table class="table">
                <tr>
                  <td>
                    <a href="<?php echo base_url("usuarios");?>">Activos</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="<?php echo base_url('usuarios_desactivados'); ?>">Eliminados</a>
                  </td>
                </tr>
                </table>
              </div>
            </div>
          
          
        </div>
    </div>
