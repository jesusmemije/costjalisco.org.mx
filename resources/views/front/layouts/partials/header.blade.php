<!--============= Header Desktop ==================-->
<header id="header" class="hidden-phone">
    <div class="header-top">
        <div class="row flex-nowrap justify-content-between align-items-center mx-0">
            <div class="col-12 d-flex justify-content-end align-items-center">
                <div class="c">
                <!-- // Mostramos todos los botones de Escritorio de encabezado -->
                    <nav class="nav d-flex justify-content-between" >
                        <a class="p-2 text-white nav-link" href="{{ route('interest-sites') }}">Sitios de interés</a>
                        <div class="divider"></div>

                        <a class="p-2 text-white nav-link" href="{{ route('sitemap') }}">Mapas del sitio</a>

                        <div class="divider"></div>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ route('dashboard') }}" class="p-2 text-white nav-login">DASHBOARD</a>
                        @else
                        <a href="{{ route('login') }}" class="p-2 text-white nav-login">INGRESAR</a>
                        @endif
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--Mostramos los logos de costjalisco y el logo de ciudada jalisco-->
    <div class="header-img">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-sm-12 text-center">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/img/header/logo-costjalisco.png') }}" class="img-fluid logo-costjalisco"
                            alt="Logo-costjalisco">
                    </a>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('assets/img/header/vector-ciudad.png') }}" class="img-fluid"
                        alt="Ciudad-costjalisco">
                </div>
            </div>
        </div>
    </div>
    <!--Mostramos todos menú del costjalisco-->
    <div class="header-menu">
        <div class="container">
            <div class="nav-scroller mb-2">
                <nav class="nav d-flex justify-content-between">
                <!--Mostramos el boton de inicio-->
                    <a href="{{ route('index') }}" class="p-2">INICIO</a>
                    <div class="divider"></div>
                    <!--Mostramos el boton de Conoce más-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownConoceMas" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CONOCE MÁS
                        </a>
                        <!--Mostramos los submenú que se encuentran dentro del menú de conoce más-->
                        <div class="dropdown-menu" aria-labelledby="dropdownConoceMas">
                            <a class="dropdown-item" href="{{ route('know-more') }}">Historia</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('know-more') }}#que-es-cost">¿Qué es CoST?</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('know-more') }}#beneficios">Beneficios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('know-more') }}#procesos-de-cost">Procesos de
                                CoST</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <!--Mostramos el boton de Nosotros-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownNosotros" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOSOTROS
                        </a>
                         <!--Mostramos los submenú que se encuentran dentro del menú de NOSOTROS-->
                        <div class="dropdown-menu" aria-labelledby="dropdownNosotros">
                            <a class="dropdown-item" href="{{ route('about-us') }}#cost-jalisco">CoST Jalisco</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('about-us') }}#objetivo-general">Objetivo de CoST
                                Jalisco</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('multisectorial') }}">Grupo Multisectorial</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <!--Mostramos el boton de PROYECTOS-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProyectos" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PROYECTOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownProyectos">
                        <!--Mostramos los submenú que se encuentran dentro del menú de PROYECTOS-->
                            <a class="dropdown-item" href="{{route('statistics')}}">Estadísticas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('search-engine')}}">Motor de búsqueda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('georeferencing')}}">Georreferenciación</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('list-projects')}}">Listado de obras</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <!--Mostramos el boton de RECURSOS-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownRecursos" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            RECURSOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownRecursos">
                        <!--Mostramos los submenú que se encuentran dentro del menú de RECURSOS-->
                            <a class="dropdown-item" href="{{ route('resources') }}">Documentos de interés</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('support-material') }}">Material de apoyo</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <!--Mostramos el boton de NOTICIAS-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownNoticias" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOTICIAS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownNoticias">
                        <!--Mostramos los submenú que se encuentran dentro del menú de NOTICIAS-->
                            <a class="dropdown-item" href="{{route('eventos')}}">Eventos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('newsletters')}}">Boletines</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('journal') }}">Notas periodísticas</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <a class="p-2" href="{{route('search-engine')}}"><img
                            src="{{ asset('assets/img/header/search.png') }}" class="img-fluid" width="20" alt=""></a>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--============= End Header Desktop ==================-->

<!--============= Header Phone ==================-->
<header id="header-phone" class="hidden-desktop">
    <div class="row h-100 align-items-center mx-0">
        <div class="col-md-12 d-flex justify-content-between" style="align-items: center;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                    <title>Menu</title>
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"
                        d="M4 7h22M4 15h22M4 23h22" style="color: #E3A11C"></path>
                </svg>
            </button>

            <div style="border-left: solid 1px #95A0A0; height: 25px;"></div>

            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/img/header/logo-movil.png') }}" width="100" alt="Logo-costjalisco">
            </a>

            <div style="margin-left: 36px;">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('assets/img/header/home.png') }}" class="img-fluid" alt="Home-costjalisco">
                </a>
    
                @if (Route::has('login'))
                    @auth
                    <a href="{{ route('dashboard') }}" class="p-2 text-white nav-login">DASHBOARD</a>
                    @else
                    <a href="{{ route('login') }}" class="p-2 text-white nav-login">INGRESAR</a>
                    @endif
                @endif
    
                <a href="{{route('search-engine')}}" style="border-left: solid 1px #95A0A0; padding: .2rem .5rem !important;">
                    <img src="{{ asset('assets/img/header/search.png') }}" class="img-fluid" width="20" alt="">
                </a>
            </div>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 12px; padding-right: 28px; max-width: 80%; border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown" style="border-bottom: solid 1px #61A8BD;">
                    <a class="nav-link dropdown-toggle" href="{{ route('index') }}">
                        INICIO
                    </a>
                </li>
                <li class="nav-item dropdown" style="border-bottom: solid 1px #61A8BD;">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownConoceMas" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CONOCE MÁS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownConoceMas">
                        <a class="dropdown-item" href="{{ route('know-more') }}">Historia</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('know-more') }}#que-es-cost">¿Qué es CoST?</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('know-more') }}#beneficios">Beneficios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('know-more') }}#procesos-de-cost">Procesos de
                            CoST</a>
                    </div>
                </li>
    
                <li class="nav-item dropdown" style="border-bottom: solid 1px #61A8BD;">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownNosotros" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        NOSOTROS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownNosotros">
                        <a class="dropdown-item" href="{{ route('about-us') }}#cost-jalisco">CoST Jalisco</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('about-us') }}#objetivo-general">Objetivo de CoST
                            Jalisco</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('multisectorial') }}">Grupo Multisectorial</a>
                    </div>
                </li>

                <li class="nav-item dropdown" style="border-bottom: solid 1px #61A8BD;">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownProyectos" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PROYECTOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownProyectos">
                        <a class="dropdown-item" href="{{route('statistics')}}">Estadísticas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('search-engine')}}">Motor de búsqueda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('georeferencing')}}">Georreferenciación</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('list-projects')}}">Listado de obras</a>
                    </div>
                </li>

                <li class="nav-item dropdown" style="border-bottom: solid 1px #61A8BD;">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownRecursos" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        RECURSOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRecursos">
                        <a class="dropdown-item" href="{{ route('resources') }}">Documentos de interés</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('support-material') }}">Material de apoyo</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownNoticias" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        NOTICIAS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownNoticias">
                        <a class="dropdown-item" href="{{route('eventos')}}">Eventos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('newsletters')}}">Boletines</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('journal') }}">Notas periodísticas</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--============= End Header Phone ==================-->