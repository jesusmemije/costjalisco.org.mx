@extends('front.layouts.app')

@section('title')
Conoce más
@endsection

@section('content')

<style>

    .tr1{
    background-image: url("../assets/img/organizations/publico2.png");
    color: #fff;
    font-size: 1em;
    }
    .know-more-list {
        color: red;
        list-style-type: disc;
    }

    .know-more-list p {
        color: #2C4143;
    }

    .subtitle-barra-gris {
        background-size: 500px;
        padding-left: 6rem;
        font-size: 24px;
    }
    .divcost{
       letter-spacing: normal;
        width:78%;
    }
    #procesos-cost-movil{
        display: none;
    }

    @media only screen and (max-width: 480px) {

        #procesos-cost{
            display: none;
        }
        #procesos-cost-movil{
            display: block;
            padding: 0;
            margin: 0;
        }
        .title-phone {
            background-image: url("{{asset('assets/img/bg-gris-phone.jpg')}}");
            color: #fff;
            font-size: 1em;
            background-size: cover;
        }
        .rojo{
            color: red;
        }
        .rojo p{
            color: #2C4143;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .title-barra-roja {
            font-size: 24px;
        }

        .subtitle-barra-gris {
            background-size: 300px;
            padding-left: 3rem;
            font-size: 22px;
        }
        #text {
		text-align: justify;
		-webkit-hyphens: auto; /* A día de hoy aún es necesario el prefijo para soportar a Safari */
		hyphens: auto;
	}
        
}
</style>


<div class="main">
    <!--Mostramos el Titulo de Historia-->
    <div class="row mx-0 my-4" id="historia">
        <div class="col-md-6 px-0">
            <div class="text-white" >
                <h3 class="py-2 font-weight-bold title-barra-roja" style="padding-left:33%">Historia</h3>
            </div>
        </div>
    </div>

    <!--En está Sección mostramos la Historia CoST -->
    <div class="container divcost">
        <div class="row" >
            <div class="col-md-12"  style="text-align: justify;" >
            <div  class="hidden-desktop-mini" style="text-align: justify;">
                <p>
                    CoST se lanzó desde el Reino Unido como una iniciativa global en 2012 con el apoyo del Banco Mundial
                    surgió de las 
                    lecciones aprendidas de un programa piloto de tres años que probó la viabilidad de un nuevo proceso
                    de transparencia y 
                    responsabilidad en la infraestructura pública en ocho países.</p>
                    
                <p style="font-weight: 600;">
                    Actualmente CoST trabaja globalmente con miembros distribuidos en 20 países de cuatro continentes,
                    sus
                    miembros son de gobiernos subnacionales y nacionales y representan economías emergentes y de bajos
                    ingresos e
                    incluyen cinco Estados frágiles y afectados por conflictos.
                    
                </p>
                <p>
                    Además, colabora internacionalmente con organizaciones clave en materia de transparencia y en el
                    combate a la corrupción
                    para facilitar el intercambio global de experiencias y conocimientos sobre transparencia y
                    responsabilidad en la
                    infraestructura pública. Entre los socios internacionales de CoST están: Article 19, Open
                    Contracting Partnership,
                    Transparency International, Open Government Partnership e Hivos.
                </p>
                <p style="font-weight: 600;">
                   Esta Iniciativa trabaja con el Gobierno, la Industria y la sociedad civil para promover le
                    divulgación, validación e 
                    interpretación de datos de proyectos de infraestructura.
                </p>
                <p>
                    CoST tiene una trayectoria en ahorros de costos, reformas legales e institucionales y en el
                    desarrollo de capacidades de 
                    grupos interesados. Esto hace que la iniciativa esté idealmente posicionada para dirigir esfuerzos
                    futuros de aumento de la
                    transparencia, rendición de cuentas, así como la mejora en el costo/efectividad en la entrega de la
                    infraestructura pública.
                <p>
                    Dentro de su estructura, la Junta de CoST Internacional es responsable de gobernar la iniciativa:
                    entre sus tareas se
                    encuentran; el aprobar la estrategia y los presupuestos, establecer los principios y los estándares
                    para la participación y la
                    admisión de nuevos países a la iniciativa de CoST. La Junta nombra
                        una Secretaria Internacional para proveer apoyo
                        administrativo para el programa internacional de CoST, apoyar a los países interesados en
                        unirse a CoST, proveer
                        guía y asistencia técnica a los programas nacionales y administrar fondos
                        internacionales.</span>
                </p>
            </div>
            </div>
        </div>
    </div>

    <!--Mostramos el Titulo de ¿Qué es CoST?-->
    <div class="row mx-0 my-4" id="que-es-cost">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja" style="padding-left:30%">¿Qué es CoST?</h3>
            </div>
        </div>
    </div>

    <!-- En está sección mostramos la descripcion CoST -->
    <div class="container divcost">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: justify;">
                <p>
                La iniciativa de Transparencia en Infraestructura [Construction Sector Transparency Initiative] o "CoST" por sus siglas en
                inglés, es la encargada de promover la transparencia y la rendición de cuentas dentro de las diferentes etapas de los proyectos
                de infraestructura y obra pública.
                </p>
                <p>
                Actualmente, tiene presencia en 19 países distribuidos en cuatro continentes, donde trabaja directamente con el Gobierno, la
                sociedad civil y la industria del ramo de la construcción para promover la divulgación, validación e interpretación de datos de 
                proyectos de infraestructura y obra pública.
                </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mostramos el título de Beneficios-->
    <div class="row mx-0 my-4" id="beneficios">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja" style="padding-left:30%">Beneficios</h3>
            </div>
        </div>
    </div>
    <!--Aquí mostramos los la descripción de los beneficios de CoST-->
    <div class="container divcost">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: justify;">
                <p>
                CoST representa un mejor valor para los gobiernos porque demuestra cómo se gasta el dinero público, identifica los
                potenciales ahorros eficientes y complementa las reformas en la gestión de finanzas públicas y procesos de adquisición de
                infraestructura, además de fomentar y desarrollar transparencia.
                </p>
                <p style="font-weight: 600;">
                CoST representa un mejor valor para las comunidades porque asegura una entrega de infraestructura eficiente en 
                costos y con una mejor calidad, capaz de cambiar vidas. Las comunidades ganan acceso a trabajo y mercados a 
                través de carreteras y calles mejoradas, agua potable limpia, educación en escuelas bien construidas o tratamiento
                médico en hospitales seguros, entre otras.
                </p>
                <p>
                Esto ayuda a informar y empoderar a los ciudadanos, permitiéndoles exigirles cuentas a los tomadores de decisiones.
                Ciudadanos informados e instituciones públicas receptivas pueden liderar la introducción de reformas que reducirán la mala
                gestión, ineficiencia, corrupción y el riesgo planteado al público como resultado de la mala infraestructura.
                </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Mostramos el título de Procesos de CoST-->
    <div class="row mx-0 my-4" id="procesos-de-cost">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja" style="padding-left:30%">Procesos de CoST</h3>
            </div>
        </div>
    </div>
    <!--En esta sección del código lo que se hizo es crear una tabla para que dentro de 
    ella se agregaran 3 procesos de CoST-->
    <div class="container divcost" id="procesos-cost">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: justify;">
               
                <table class="table col-md-12 table-bordered">
            <tr class="tr1">
                <th class="th-institucion" style="text-align: center; width:28%;">
                    
                    <h5 style="font-weight: 600;">DIVULGACIÓN</h5>
                </th>
                <th class="th-titular" style="text-align: center; width:32%;">
                   
                <h5 style="font-weight: 600;">ASEGURAMIENTO</h5>
                </th>
                <th class="th-enlace" style="text-align: center; width:40%;">
                   
                <h5 style="font-weight: 600;">AUDITORÍA SOCIAL</h5>
                </th>
            </tr>
            <tbody>
               <tr>
               <!--Mostramos la descripción de DIVULGACIÓN-->
               <td style="text-align: justify;"> 
                    Consiste en garantizar que la información sobre el propósito, alcance, costos y ejecución de los
                    proyectos de infraestructura
                    y obra pública esté abierta y accesible al público, divulgándola de manera oportuna a través de la
                    plataforma de divulgación.
               </td>
                <!--En está parte mostramos la descrpción de ASEGURAMIENTO-->
               <td>
               Consiste en evaluar la credibilidad de la información divulgada a dos niveles:
               
                <ul class="know-more-list" style="text-align: justify; margin-top:4%">
                        <li class="rojo">
                            <p>A nivel de sector y a nivel de entidad de adquisición, sobre la integridad y exactitud de
                                la información divulgada, y sobre las
                                características generales de desempeño: y </p>
                        </li>
                        <li>
                            <p>A nivel de proyecto, en una pequeña muestra aleatoria, en la cual se resaltan los asuntos
                                que pueden ser potencialmente 
                                preocupantes para los actores clave involucrados en los proyectos.</p>
                        </li>
                    </ul>
               </td>
               <!--Mostramos la descrpción de AUTORIDAD SOCIAL-->
               <td>

               <p style="text-align: justify;">
                    Consiste en trabajar con las partes interesadas para promover los resultados del proceso de
                    seguimiento, con la finalidad 
                    de poner los asuntos clave en el dominio público. De esta manera, la sociedad civil, los medios de
                    comunicación y los 
                    ciudadanos pueden ser conscientes de los problemas y demandar la rendición de cuentas a los
                    responsables de la toma de 
                    decisiones.
                </p>

                <p style="text-align: justify;">
                   La implementación de CoST en Jalisco, pretende mejorar la transparencia en los procesos de
                    infraestructura, mediante el 
                    estándar de contrataciones abiertas, cuyos indicadores han sido ajustados por parte de los
                    integrantes del Grupo 
                    Multisectorial a los procesos y conceptos utilizados en la entidad, (identificación, preparación,
                    contratación, ejecución y evaluación).
                </p>
                <p style="text-align: justify;">
                    Aunado a ello, se pretende generar capacidades a la sociedad civil para la vigilancia y monitoreo de
                    las obras públicas que 
                    encuentren publicadas bajo los estándares antes referidos.
                </p>
               
               </td>
               
               </tr>
        </table>

                </div>
            </div>
        </div>
    </div>


    <div id="procesos-cost-movil">
        
            <div class="row mx-0 my-4 ">
                <div class="col-md-6 px-0">
                    <div class="text-white">
                        <h3 class="py-2 font-weight-bold title-phone " style="padding-left:30%">DIVULGACIÓN</h3>
                    </div>
                </div>
            </div>
            
            <div class="container divcost" style="text-align: justify;">
                Consiste en garantizar que la información sobre el propósito, alcance, costos y ejecución de los
                proyectos de infraestructura
                y obra pública esté abierta y accesible al público, divulgándola de manera oportuna a través de la
                plataforma de divulgación.
            </div>
            <div class="row mx-0 my-4 ">
                <div class="col-md-6 px-0">
                    <div class="text-white">
                        <h3 class="py-2 font-weight-bold title-phone " style="padding-left:30%">ASEGURAMIENTO</h3>
                    </div>
                </div>
            </div>
            <div class="container divcost" id="content-proceso-phone">
                Consiste en evaluar la credibilidad de la información divulgada a dos niveles:
                <div class="d-flex mt-3">
                    <li class="rojo"></li>
                        <p style="text-align: justify;">A nivel de sector y a nivel de entidad de adquisición, sobre la integridad y exactitud de
                            la información divulgada, y sobre las
                            características generales de desempeño: y </p>

                </div>
                <div class="d-flex">
                    <li class="rojo"></li>
                        <p style="text-align: justify;">A nivel de proyecto, en una pequeña muestra aleatoria, en la cual se resaltan los asuntos
                            que pueden ser potencialmente 
                            preocupantes para los actores clave involucrados en los proyectos.</p>
                    
                </div>
            </div>
            <div class="row mx-0 my-4 ">
                <div class="col-md-6 px-0">
                    <div class="text-white">
                        <h3 class="py-2 font-weight-bold title-phone " style="padding-left:30%">AUDITORIA SOCIAL</h3>
                    </div>
                </div>
            </div>
                       
            <div class="container divcost" id="content-proceso-phone">
                <p style="text-align: justify;">
                    Consiste en trabajar con las partes interesadas para promover los resultados del proceso de
                    seguimiento, con la finalidad 
                    de poner los asuntos clave en el dominio público. De esta manera, la sociedad civil, los medios de
                    comunicación y los 
                    ciudadanos pueden ser conscientes de los problemas y demandar la rendición de cuentas a los
                    responsables de la toma de 
                    decisiones.
                </p>
                <p style="text-align: justify;">
                    La implementación de CoST en Jalisco, pretende mejorar la transparencia en los procesos de
                        infraestructura, mediante el 
                        estándar de contrataciones abiertas, cuyos indicadores han sido ajustados por parte de los
                        integrantes del Grupo 
                        Multisectorial a los procesos y conceptos utilizados en la entidad, (identificación, preparación,
                        contratación, ejecución y evaluación).
                    </p>
                    <p style="text-align: justify;">
                    Aunado a ello, se pretende generar capacidades a la sociedad civil para la vigilancia y monitoreo de
                    las obras públicas que 
                    encuentren publicadas bajo los entándares antes referidos.
                </p>
            </div>
        
    </div>




    <!-- Sub-Title - Divulgación -->
        <!--
    <div class="row mx-0 my-4" id="divulgacion">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Divulgación</h3>
            </div>
        </div>
    </div>
    -->

    <!-- Section - Divulgación -->
        <!--
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: justify;">
                <p>
                    Consiste en garantizar que la información sobre el propósito, alcance, costos y ejecución de los
                    proyectos de infraestructura
                    y obra pública esté abierta y accesible al público, divulgándola de manera oportuna a través de la
                    plataforma de divulgación.
                </p>
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- Sub-Title - Aseguramiento -->
    <!--
    <div class="row mx-0 my-4" id="aseguramiento">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Aseguramiento</h3>
            </div>
        </div>
    </div>

-->
    <!-- Section - Aseguramiento -->
    <!--
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>Consiste en avaluar la credibilidad de la información divulgada a dos niveles:
                    <ul class="know-more-list" style="text-align: justify;">
                        <li class="rojo">
                            <p>A nivel de sector y a nivel de entidad de adquisición, sobre la integridad y exactitud de
                                la información divulgada, y sobre las
                                características generales de desempeño: y </p>
                        </li>
                        <li>
                            <p>A nivel de proyecto, en una pequeña muestra aleatoria, en la cual se resaltan los asuntos
                                que pueden ser potencialmente 
                                preocupantes para los actores clave involucrados en los proyectos.</p>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
   -->
    <!-- Sub-Title - Auditoria social -->
     <!--
    <div class="row mx-0 my-4" id="auditoria-social">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Auditoria Social</h3>
            </div>
        </div>
    </div>

    -->

    <!-- Section - Auditoria social -->
    <!--
    <div class="container mb-md-5">
        <div class="row">
            <div class="col-md-12">
                <p style="text-align: justify;">
                    Consiste en trabajar con las partes interesadas para promover los resultados del proceso de
                    seguimiento, con la finalidad 
                    de poner los asuntos clave en el dominio público. De esta manera, la sociedad civil, los medios de
                    comunicación y los 
                    ciudadanos pueden ser conscientes de los problemas y demandar la rendición de cuentas a los
                    responsables de la toma de 
                    decisiones.
                </p>
                <p style="text-align: justify;">
                   La implementación de CoST en Jalisco, pretende mejorar la transparencia en los procesos de
                    infraestructura, mediante el 
                    estándar de contrataciones abiertas, cuyos indicadores han sido ajustados por parte de los
                    integrantes del Grupo 
                    Multisectorial a los procesos y conceptos utilizados en la entidad, (identificación, preparación,
                    contratación, ejecución y evaluación).
                </p>
                <p style="text-align: justify;">
                    Aunado a ello, se pretende generar capacidades a la sociedad civil para la vigilancia y monitoreo de
                    las obras públicas que 
                    encuentren publicadas bajo los entándares antes referidos.
                </p>
            </div>
        </div>
    </div>
    -->

</div>

@endsection