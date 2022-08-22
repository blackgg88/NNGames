<body>
    
<header class="header-area wow fadeInDown">
    <?php $session_data = $this->session->userdata('logged_in');?>
    <?php if (!$this->session->userdata('logged_in')){?>
    <?php }else if($this->session->userdata('logged_in')){?>
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 d-flex align-items-center justify-content-between">

                    <div class="search-login-area d-flex align-items-center">
                            <!-- Top Search Area -->
                        <div class="login-area">
                            <a href="<?php echo base_url("MiCuenta");?>"><span>Mi Cuenta</span> <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <?php if($session_data['perfil_id']==1){ $session_data = $this->session->userdata('logged_in');?>
                        <div class="login-area">
                            <a href="<?php echo base_url("PanelControl");?>"><span>Panel</span> <i class="fa fa-cog" aria-hidden="true"></i></a>
                        </div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
    </div>
        <?php }?> 

        <!-- Top Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="<?php echo base_url("inicio");?>"><img src="<?php echo base_url("assets/img/logo1.png");?>" alt="" style="width: 30%"></a>
                        </div>

                        <!-- Login Area -->
                        <?php $session_data = $this->session->userdata('logged_in');?>
                        <?php if (!$this->session->userdata('logged_in')){?>
                        <div class="search-login-area d-flex align-items-center">
                          <div class="login-area">
                            <a href="<?php echo base_url("login");?>"><span>Ingresar / Registrarte</span> <i class="fa fa-user-plus" aria-hidden="true"></i></a>
                          </div>
                        </div>
                        
                        <?php }else if($session_data['perfil_id']==1){ $session_data = $this->session->userdata('logged_in');?>
                        <div class="search-login-area d-flex align-items-center">
                          <div class="login-area">
                            <a href="<?php echo base_url("logout");?>"><span>Cerrar Sesion</span> <i class="fa fa-power-off" aria-hidden="true"></i></a>
                          </div>
                        </div>
                        <?php } else{ $session_data = $this->session->userdata('logged_in');?>
                        <div class="search-login-area d-flex align-items-center">
                          <div class="login-area">
                            <a href="<?php echo base_url("logout");?>"><span>Cerrar Sesion</span> <i class="fa fa-power-off" aria-hidden="true"></i></a>
                          </div>
                        </div>
                        <?php }?> 

                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="egames-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="egamesNav">

                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Inicio Navbar -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url("inicio");?>">Inicio</a></li>
                                    <li><a href="<?php echo base_url("tienda/0");?>">Tienda</a></li>
                                    <li><a href="<?php echo base_url("contacto");?>">Contacto</a></li>
                                    <li><a href="#">Nosotros</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url("comercializacion");?>">Comercializacion</a></li>
                                            <li><a href="<?php echo base_url("nosotros");?>">Sobre nosotros</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="navbar_user">
                                    <li>
                                        <a href="<?php echo base_url("shop_controller/carrito");?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="checkout_items" class="checkout_items"><?php echo $this->cart->total_items();?></span></a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Fin Navbar -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>