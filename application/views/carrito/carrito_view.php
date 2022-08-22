        <script type="text/javascript">
            function clear_cart() {
                var result = confirm('¿Borrar los datos del carrito?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/shop_controller/remove/all";
                } else {
                    return false;
                }
            }
        </script>

            <div style="text-align: center;"> 
            <?php  $cart_check = $this->cart->contents();
             if(!empty($cart_check)) {?>
                <br><br><br>
                <h2>Productos en tu carrito</h2>
                <br><br><br><br>
            <?php } else {?>
                <br><br><br><br><br><br><br><br>
                <h2>Tu carrito esta vacio</h2>
                <br><br><br><br><br><br><br><br>

            <?php }?>
            </div>
                
            <div class="container-fluid" style="overflow-x: auto">
                <table class="table" >
                  <?php
                  if ($cart = $this->cart->contents()): ?>
                    <tr style="font-weight:bold;">
                        <td>Orden</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Subtotal</td>
                        <td>Cancelar Producto</td>
                    </tr>
                    <?php
                    echo form_open('shop_controller/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $item['name']; ?>
                            </td>
                            <td>
                                $ <?php echo number_format($item['price'], 2); ?>
                            </td>
                            <td>
                                <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: center; color: black;"'); ?>
                            </td>
                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                $ <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td>
                              
                            <?php 
                            $base= base_url('assets/img/cart_cross.jpg');
                            $path = "<img src='$base') width='25px' height='20px'>";
                            echo anchor('shop_controller/remove/' . $item['rowid'], $path); ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>
                            <b>Total: $<?php echo number_format($grand_total, 2); ?></b>
                        </td>
                                                
                        <td colspan="5" class="text-right">
                            <input style="width: 20%;" type="button" class ='red_button' value="Vaciar carrito" onclick="clear_cart()">                          
                            
                            <input style="width: 20%;" type="submit" class ='red_button' value="Actualizar carrito">
                            <?php echo form_close(); ?>
                            
                            <input style="width: 20%;" type="button" class ='red_button' value="Realizar pedido" onclick="window.location.href='resumen_compra'"></td>
                    </tr>
                <?php endif; ?>
            </table>
            <br><br><br><br><br><br>
        </div>