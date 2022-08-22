
    <!-- ##### Footer Area ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-footer-widget mb-70 wow fadeInUp">
                            <div class="widget-title">
                                <a href="<?php echo base_url("inicio");?>"><img src="<?php echo base_url("assets/img/logo2.png");?>" style="width: 30%" alt=""></a>
                            </div>
                            <div class="widget-content">
                                <p>NN Games es una tienda online de venta de video juegos tanto fisico como digital en Argentina. En el mercado desde 2020, contamos con una gran varierdad de juego. Actualmente, tenemos un gran repertorio de juegos para distintas plataformas y nos encontramos en contaste crecimiento.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-6" style="text-align: right;">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="500ms">
                            <div class="widget-title">
                                <h4>Enlaces utiles</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="<?php echo base_url("comercio");?>">Comercializacion</a></li>
                                        <li><a href="<?php echo base_url("nosotros");?>">Nosotros</a></li>
                                        <li><a href="<?php echo base_url("terminos");?>">Terminos y condiciones</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-sm-5">
                        <!-- Copywrite -->
                        <p class="copywrite-text"><a>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados a <a target="_blank">NN Games</a></p>
                    </div>
                    <div class="col-12 col-sm-7">
                        <!-- Navbar -->
                        <div class="footer-nav">
                            <ul>
                                <li><a href="<?php echo base_url("inicio");?>">Inicio</a></li>
                                <li><a href="<?php echo base_url("tienda/0");?>">Tienda</a></li>
                                <li><a href="<?php echo base_url("contacto");?>">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Fin ##### -->
    <script src="<?php echo base_url("assets/js/jquery/jquery-2.2.4.min.js");?>"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url("assets/js/bootstrap/popper.min.js");?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url("assets/js/bootstrap/bootstrap.min.js");?>"></script>
    <!-- Plugins stackoverflow js -->
    <script src="<?php echo base_url("assets/js/plugins/plugins.js");?>"></script>
    <!-- Active stackoverflow js -->
    <script src="<?php echo base_url("assets/js/active.js");?>"></script>
    
    
    <script src="<?php echo base_url("assets/js/Isotope/isotope.pkgd.min.js");?>"></script>
    <script src="<?php echo base_url("assets/js/jquery-ui-1.12.1.custom/jquery-ui.js");?>"></script>
    <script src="<?php echo base_url("assets/js/custom.js");?>"></script>
    <script src="<?php echo base_url("assets/js/categories_custom.js");?>"></script>

    <!-- Script Acordion -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
</body>
  
</html>