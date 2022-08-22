<div class="container product_section_container" style="margin-top: 40px">
    <div class="row">
      <div class="col product_section clearfix">

        <!-- Sidebar -->

        <div class="sidebar">
          <div class="sidebar_section">
            <div class="sidebar_title">
              <h5>Categoria del producto</h5>
            </div>
            <ul class="sidebar_categories">
              <li><a href="<?php echo base_url("tienda/0");?>">Todos los productos</a></li>
              <li><a href="<?php echo base_url("tienda/1");?>">Juegos de Consolas</a></li>
              <li><a href="<?php echo base_url("tienda/2");?>">Juegos de PC</a></li>
              <li><a href="<?php echo base_url("tienda/3");?>">Equipos</a></li>
            </ul>
          </div>

          <!-- Price Range Filtering -->
          <div class="sidebar_section">
            <div class="sidebar_title">
              <h5>Filtrar por precio</h5>
            </div>
            <p>
              <input id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
            <div class="filter_button"><span>filtrar</span></div>
          </div>


        </div>

        <!-- Main Content -->

        <div class="main_content">

          <!-- Products -->

          <div class="products_iso">
            <div class="row">
              <div class="col">


                <!-- Product Sorting -->

                <div class="product_sorting_container product_sorting_container_top">
                  <ul class="product_sorting">
                    <li>
                      <span class="type_sorting_text">Orden por Defecto</span>
                      <i class="fa fa-angle-down"></i>
                      <ul class="sorting_type">
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Orden por Defecto</span></li>
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Precio</span></li>
                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Nombre</span></li>
                      </ul>
                    </li>
                  </ul>
                </div>

                <!-- Product Grid -->

                <div class="product-grid">                  
                  <?php foreach ($productos as $product){
                    $id = $product['id'];
                    $name = $product['nombre'];
                    $price = $product['precio'];
                  ?>

                  <div class="product-item">
                    <div class="product discount product_filter">
                      <div class="product_image">
                        <img src="<?php echo base_url() . $product['imagen'] ?>" alt="">
                      </div>
                      
                      <div class="product_info">
                        <h6 class="product_name"><a href=""><?php echo $name; ?></a></h6>
                        <div class="product_price">$<?php echo $price; ?></div>
                        <?php 
                        echo form_open('anadirCarrito');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        ?>
                      </div>

                    </div>
                    <div id='add_button' style="color: white">
                      <?php
                        $btn = array(
                            'class' => 'red_button add_to_cart_button',
                            'value' => 'AÑADIR AL CARRITO',
                            'name' => 'action'
                        );
                        
                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        ?>
                          
                    </div>

                  </div>
                  <?php } ?>

                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<br><br><br>