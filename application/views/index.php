    <!-- ##### Main Area ##### -->
    <div class="hero-area">
        <!-- Carrusel -->
       <div class="hero-post-slides owl-carousel">

            <div class="single-slide bg-img bg-overlay" style="background-image: url(assets/img/2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-lg-9">
                            <div class="blog-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="400ms">God Of War 4</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">Kratos, que ha dejado atrás el mundo de los dioses, deberá adaptarse a tierras que no le son familiares, afrontar peligros inesperados y aprovechar una segunda oportunidad de ejercer como padre. Junto a su hijo Atreus se aventurará en lo más profundo e inclemente de las tierras de Midgard y luchará por culminar una búsqueda profundamente personal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slide bg-img bg-overlay" style="background-image: url(assets/img/1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-lg-9">
                            <div class="blog-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="400ms">Anthem</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">Anthem está ubicado en un futuro distópico en donde la humanidad ha sido aislada detrás de la pared protectora de Fort Tarsis, protegida de los muchos peligros de las tierras primitivas que hay detrás de la pared. Los Freelancers son un grupo de personas encargadas de explorar estas zonas alejadas del muro en búsqueda de recolectar nuevos objetos para la humanidadt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Main Area Fin ##### -->


    <!-- ##### Popular Area ##### -->
    <section class="monthly-picks-area section-padding-100 bg-pattern">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="left-right-pattern"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title mb-70 wow fadeInUp">Lo mas comprado</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs wow fadeInUp" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Popular</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content wow fadeInUp" id="myTabContent">
            <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                <!-- Popular Carrusel -->
                <div class="popular-games-slideshow owl-carousel">
                    <?php foreach ($productos as $product){
                        $id = $product['id'];
                        $name = $product['nombre'];
                        $price = $product['precio'];
                    ?>
                   
                    <div class="single-games-slide">
                        <img src="<?php echo base_url() . $product['imagen'] ?>" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title"><?php echo $name; ?></a>
                            <div class="meta-data">
                                <a href="#">Precio: $<?php echo $price;?></a>
                            </div>
                            <?php 
                            echo form_open('anadirCarrito');
                            echo form_hidden('id', $id);
                            echo form_hidden('name', $name);
                            echo form_hidden('price', $price);
                            ?>
                        </div>
                        <div id='add_button'>
                        <?php
                            $btn = array(
                                'class' => 'btn egames-btn w-100',
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
    </section> 

    <!-- ##### Popular Area Fin ##### -->