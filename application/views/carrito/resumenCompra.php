<style type="text/css">
  input{
    color: black;
  }
</style>
<script>
function newDoc() {
  window.location.assign("<?php echo base_url("tienda/0");?>")
}
</script>
<br><br>
 <div class="breadcumb_area bg-img" style="background-image: url(<?php echo base_url("assets/img/breadcumb.jpg");?>">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Resumen de Compra</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Direccion de Envio</h5>
                        </div>

                       <?php echo form_open("validar_compra", ['class' => 'form', 'role' => 'form']); ?>
                            <div class="row">
                                <div class="col-12">
                                    <?php echo form_error('direccion'); ?>
                                    <?php echo form_label('Direccion *', 'direccion'); ?>
                                    <?php echo form_input(['name' => 'direccion', 'id' => 'direccion', 'class' => 'form-control', 'autofocus'=>'autofocus', 'required'=>'required','value'=>set_value('direccion')]); ?>
                                </div>
                                <div class="col-12">
                                    <?php echo form_error('codPostal'); ?>
                                    <?php echo form_label('Codigo Postal *', 'codPostal'); ?>
                                    <?php echo form_input(['name' => 'codPostal', 'id' => 'codPostal', 'class' => 'form-control', 'autofocus'=>'autofocus', 'required'=>'required','value'=>set_value('codPostal')]); ?>
                                </div>
                                <div class="col-12">
                                    <?php echo form_error('ciudad'); ?>
                                    <?php echo form_label('Ciudad/Pueblo *', 'ciudad'); ?>
                                    <?php echo form_input(['name' => 'ciudad', 'id' => 'ciudad', 'class' => 'form-control', 'autofocus'=>'autofocus', 'required'=>'required','value'=>set_value('ciudad')]); ?>
                                </div>
                                <div class="col-12">
                                    <?php echo form_error('provincia'); ?>
                                    <?php echo form_label('Provincia *', 'provincia'); ?>
                                    <?php echo form_input(['name' => 'provincia', 'id' => 'provincia', 'class' => 'form-control', 'autofocus'=>'autofocus', 'required'=>'required','value'=>set_value('provincia')]); ?>
                                </div>
                                
                            </div>
                            <div>
                              <br>
                                <button id="review_submit" style="color: white" type="submit" class="red_button" value="Submit">Realizar compra</button>
                            </div>
                            <br>
                        <?php echo form_close();?>
                        <div style="width: 50%">
                          <button style="color: white" type="submit" class="red_button"  onclick="newDoc()">Volver a la tienda</button>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Detalles de la Orden</h5>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Productos</span></li> 
                              <table class="table">
                                <?php 

                                if (empty($cart_check)) {
                                  $grand_total = 0;
                                }
                                if ($this->cart->contents() > 0){ 
                                  $cart = $this->cart->contents()
                                  ?>

                                  <tr style="font-weight:bold;">
                                    <td>Producto</td>
                                    <td>Cantidad</td>
                                    <td>Subtotal</td>
                                  </tr>
                                  <?php
                                    foreach ($cart as $item){                        
                                      echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                      echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                      echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                      echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                      echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                  ?>
                                  <tr>
                                    <td>
                                      <?php echo $item['name']; ?>
                                    </td>
                                     <td>
                                       <?php echo $item['qty']; ?>
                                    </td>
                                    <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                    <td>                             
                                      $ <?php echo number_format($item['subtotal'], 2) ?>
                                    </td>
                                  <?php } ?>
                                  </tr>
                                <?php } ?>  
                              </table>
                            <li><span>Total</span> <span>$<?php echo number_format($grand_total, 2); ?></span></li>
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>