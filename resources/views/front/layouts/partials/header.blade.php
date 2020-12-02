<header id="header">
    <div class="header-top">
        <div class="row flex-nowrap justify-content-between align-items-center mx-0">
            <div class="col-12 d-flex justify-content-end align-items-center">
                <div class="nav-scroller py-1">
                    <nav class="nav d-flex justify-content-between">
                        <a class="p-2 text-white nav-link" href="#">Preguntas frecuentes</a>
                        <div class="divider"></div>
                        <a class="p-2 text-white nav-link" href="#">Sitios de interés</a>
                        <div class="divider"></div>
                        <a class="p-2 text-white nav-link" href="#">Mapas del sitio</a>
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
    <div class="header-img">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset('assets/img/header/logo-costjalisco.png') }}" class="img-fluid" alt="Logo-costjalisco">
                    </a>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('assets/img/header/vector-ciudad.png') }}" class="img-fluid" alt="Ciudad-costjalisco">
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="nav-scroller mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a href="{{ route('home.index') }}" class="p-2">INICIO</a>
                    <div class="divider"></div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownConoceMas" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CONOCE MÁS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownConoceMas">
                            <a class="dropdown-item" href="{{ route('home.know-more') }}">Historia</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#que-es-cost">¿Qué es CoST?</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#beneficios">Beneficios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#procesos-de-cost">Procesos de CoST</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#divulgacion">&nbsp;&bull; Divulgación</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#aseguramiento">&nbsp;&bull; Aseguramiento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.know-more') }}#auditoria-social">&nbsp;&bull; Auditoria Social</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownNosotros" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOSOTROS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownNosotros">
                            <a class="dropdown-item" href="{{ route('home.about-us') }}#cost-jalisco">CoST Jalisco</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.about-us') }}#objetivo-general">Objetivo de CoST Jalisco</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.about-us') }}">Integración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.about-us') }}">Grupo Multisectorial</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('home.specific_project')}}" id="dropdownProyectos" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PROYECTOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownProyectos">
                            <a class="dropdown-item" href="{{route('home.specific_project')}}">Estadísticas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Motor de búsqueda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Georreferenciación</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Institución Pública</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownRecursos" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            RECURSOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownRecursos">
                            <a class="dropdown-item" href="{{ route('home.resources') }}">Documentos de interés</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('home.resources') }}">Material de apoyo</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownNoticias" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOTICIAS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownNoticias">
                            <a class="dropdown-item" href="#">Eventos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('home.newsletters')}}">Boletines</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Notas periodísticas</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <div class="divider"></div>
                    <a class="p-2" href="#"><i class="fas fa-search"></i></a>
                </nav>
            </div>
        </div>
    </div>
</header>