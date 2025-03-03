<header class="wrapper">

    <nav class="navbar navbar-expand-lg classic transparent position-absolute navbar-dark">
        <div class="container flex-lg-row flex-nowrap align-items-center">

            <div class="navbar-brand w-100">
                <a href="{{ url('/') }}" class="logo">
                    <img class="logo-dark" src="{{ asset('assets/img/logo-dark.png') }}"
                        srcset="{{ asset('assets/img/logo-dark@2x.png 2x') }}" alt="Logo">
                    <img class="logo-light" src="{{ asset('assets/img/logo-light.png') }}"
                        srcset="{{ asset('assets/img/logo-light@2x.png 2x') }}" alt="Logo">
                </a>
            </div>

            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="https://30semanas.com.br/#decisoes">Decisões</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="https://30semanas.com.br/#partilhas">Partilhas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="https://30semanas.com.br/all_celebracao">Celebrações</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="https://30semanas.com.br/#contato">Contato</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="https://30semanas.com.br/entrar/novo">Cadastre-se</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle show" href="#" data-bs-toggle="dropdown"
                                aria-expanded="true">Meu Perfil</a>
                            <ul class="dropdown-menu show" data-bs-popper="static">

                                <li class="dropdown dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"><i
                                            class="uil uil-bright"></i> Administração</a>
                                    <ul class="dropdown-menu">

                                        <li class="nav-item">
                                            <a class="dropdown-item" href="https://30semanas.com.br/pessoa"><i
                                                    class="uil uil-users-alt"></i> Participantes / Líderes</a>
                                        </li>

                                        <!-- <li class="nav-item">
                                                        <a class="dropdown-item" href="#"><i class="uil uil-calendar-alt"></i> Agenda de Partilhas</a>
                                                    </li> -->

                                        <li class="nav-item">
                                            <a class="dropdown-item" href="https://30semanas.com.br/igreja"><span
                                                    class="material-symbols-outlined"
                                                    style="font-size: 15px;">church</span> Lista de Igrejas </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="dropdown-item" href="https://30semanas.com.br/celebracao"><i
                                                    class="uil uil-youtube"></i> Vídeos do YouTube</a>
                                        </li>


                                        <li class="nav-item">
                                            <a class="dropdown-item" href="https://30semanas.com.br/partilha"><i
                                                    class="uil uil-shield-check"></i> Salas de Partilhas</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item" href="https://30semanas.com.br/entrar/editar"><i
                                            class="uil uil-user"></i> Editar meus Dados</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item" href="https://30semanas.com.br/entrar/presenca"><i
                                            class="uil uil-user-check"></i> Minhas Presenças</a>
                                </li>


                                <li class="nav-item">
                                    <a class="dropdown-item" href="https://30semanas.com.br/entrar/editar_senha"><i
                                            class="uil uil-data-sharing"></i> Alterar Senha</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item" href="https://30semanas.com.br/logout"><i
                                            class="uil uil-signout"></i> Sair da Partilha</a>
                                </li>

                            </ul>
                        </li>


                    </ul>

                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                            <br /> 00 (123) 456 78 90 <br />
                            <nav class="nav social social-white mt-4">
                                <a href="#"><i class="uil uil-twitter"></i></a>
                                <a href="#"><i class="uil uil-facebook-f"></i></a>
                                <a href="#"><i class="uil uil-dribbble"></i></a>
                                <a href="#"><i class="uil uil-instagram"></i></a>
                                <a href="#"><i class="uil uil-youtube"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    
                    <li class="nav-item">


                        <a href="https://30semanas.com.br/#partilhas"
                            class="btn btn-orange btn-icon btn-icon-start rounded"
                            style="background-color: #f78b77; border-color: #f78b77;">
                            <i class="uil uil-signin"></i> Alex, vamos partilhar?
                        </a>

                    </li>
                    
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
        </div>
    </nav>




    <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-6">
            <div class="widget mb-8">
                <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution for your
                    business.</p>
            </div>
            <div class="widget mb-8">
                <h4 class="widget-title text-white mb-3">Contact Info</h4>
                <address> Moonshine St. 14/05 <br /> Light City, London </address>
                <a href="mailto:first.last@email.com">info@email.com</a><br /> 00 (123) 456 78 90
            </div>
            <div class="widget mb-8">
                <h4 class="widget-title text-white mb-3">Learn More</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Our Story</a>
                    </li>
                    <li><a href="#">Terms of Use</a>
                    </li>
                    <li><a href="#">Privacy Policy</a>
                    </li>
                    <li><a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Follow Us</h4>
                <nav class="nav social social-white">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                </nav>
            </div>
        </div>
    </div>
</header>
