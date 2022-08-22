
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(assets/img/23.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Breadcrumb Text -->
                <div class="col-12">
                    <div class="breadcrumb-text">
                        <h2>Contacto</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ##### Contacto Area ##### -->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="contact-content mb-100">
                                <a class="mb-50 d-block"><img src="assets/img/logo1.png" alt="" style="width: 90%"></a>
                                
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="contact-content mb-100">
                                <p>Hay muchas formas de contactarnos. Puede escribirnos una línea, llamarnos o enviarnos un correo electrónico, elegir lo que más le convenga.</p><br>
                                <p><b>Horario de atención:</b> 8.00-18.00 de lunes a viernes.</p>
                                <p><b>Domingo cerrado</b></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="contact-content mb-100">
                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="title">
                                        <p>Direccion</p>
                                    </div>
                                    <p>Av. Gdor. Ruiz 2350</p>
                                </div>

                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="title">
                                        <p>Telefono</p>
                                    </div>
                                    <p>(800) 000-0000</p>
                                </div>

                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="title">
                                        <p>E-mail</p>
                                    </div>
                                    <p>info.NNgames@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contacto Form Area -->
                <div class="col-12">
                    <h4 class="mb-70">Ponerse en contacto</h4>

                    <div class="contact-form-area mb-100">
                        <form action="<?php echo base_url('consulta')?>" method="post" class="form-sigin" reole="form" id="myform">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input id="name" class="form-control" type="text" name="name" placeholder="nombre" required="requerido" data-error="Se requiere nombre.">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input id="email" class="form-control" type="email" name="email" placeholder="email" required="requerido" data-error="Se requiere el email.">
                                </div>
                                <div class="col-12">
                                    <input id="asundo" class="form-control" type="text" name="asunto" placeholder="Asunto" required="requerido" data-error="Se requiere asunto.">
                                </div>
                                <div class="col-12">
                                    <textarea id="mensaje" class="form-control" cols="30" rows="10" name="mensaje"  placeholder="Mensaje" required data-error="Por favor, escriba su mensaje."></textarea>
                                </div>
                                <div class="col-12">
                                    <button id="review_submit" type="submit"  class="btn egames-btn w-100" value="Submit">Enviar Mensaje</button>
                                </div>
                            </div>
                            <br>
                            <div class="alert alert-success" style="visibility: <?php echo "$vision"?>;">Su consulta ha sido enviado correctamente.</div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <!-- Google Maps -->
                    <div class="map-area">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4209.8805201409905!2d-58.822432494963756!3d-27.46697297846819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDI4JzAwLjciUyA1OMKwNDknMTIuNyJX!5e0!3m2!1ses!2sar!4v1555283896230!5m2!1ses!2sar" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contacto Area fin ##### -->