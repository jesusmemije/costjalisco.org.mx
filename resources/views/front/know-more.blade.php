@extends('front.layouts.app')

@section('title')
Conoce más
@endsection

@section('content')

<style>
    .listStyle {
        color: red;
        list-style-type: disc;
    }

    .listStyle p {
        color: #2C4143;
    }
</style>

<div class="main">
    <!-- Title - ¿Qúes es CoST? -->
    <div class="row mx-0 my-4" id="que-es-cost">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>¿Qué es CoST?</h3>
            </div>
        </div>
    </div>

    <!-- Section - Descripción CoST -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    CoST se lanzó desde el Reino Unido como una inicialiva global en 2012 con el apoyo del Banco Mundial
                    surgió de las <br>
                    lecciones aprendidas de un programa piloto de tres años que probó la viabilidad de un nuevo proceso
                    de transparencia y <br>
                    responsabilidad en la infraestructura pública en ocho países.

                </p>
                <p style="font-weight: 600;">
                    Actualmente CoST trabaja globalmente con miembros distribuidos en 15 países de cuatro continentes,
                    sus <br>
                    miembros son de gobiernos subnacionales y nacionales y representan economías emergentes y de bajos
                    ingresos e <br>
                    incluyen cinco Estados frágiles y afectados por conflictos.
                </p>
                <p>
                    Además, colabora internacionalmente con organizaciones clave en materia de transparencia y en el
                    combate a la corrupción <br>
                    para facilitar el intercambio global de experiencias y conocimientos sobre transparencia y
                    responsabilidad en la <br>
                    infraestructura pública. Entre los socios internacionales de CoST están: Article 19, Open
                    Contracting Partnership, <br>
                    Transparency International, Open Government Partnership e Hivos.
                </p>
                <p style="font-weight: 600;">
                    Esta Iniciativa trabaja con el Gobierno, la Industia y la sociedad civil para promover le
                    divulgación, validación e <br>
                    interpretación de datos de proyectos de infraestructura.
                </p>
                <p>
                    CoST tiene una trayectoria en ahorros de costos, reformas legales e institucionales y en el
                    desarrollo de capacidades de <br>
                    grupos interesados. Esto hace que la iniciativa esté idealmente posicionado para dirigir esfuerzos
                    futuros de aumento de la <br>
                    transparencia, rendición de cuentas, así como la mejora en el costo/efectividad en la entrega de la
                    infraestructura pública.
                </p>
                <p>
                    Dentro de su estructura, la Junta de CoST Internacional es responsable de gobernar la iniciativa:
                    entre sus tareas se <br>
                    encuentran; el aprobar la estrategia y los presupuestos, establecer los principios y los estándares
                    para la participación y la <br>
                    admisión de nuevos países a la iniciativa de CoST. <span style="font-weight: 600;">La Junta nombra
                        una Secretaria Internacional para proveer apoyo <br>
                        administrativo para el prograrna internacional de CoST, apoyar a los países interesados en
                        unirse a CoST, proveer <br>
                        guía y asistencia técnica a los programas nacionales y administrar fondos
                        internacionales.</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Title - Beneficios -->
    <div class="row mx-0 my-4" id="beneficios">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>Beneficios</h3>
            </div>
        </div>
    </div>

    <!-- Section - Beneficios -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    CoST representa un mejor valor para los gobiernos porque demuestra cómo se gasta el dinero público,
                    identifica los <br>
                    potenciales ahorros eficientes y complementa las reformas en la gestión de finanzas públicas y
                    procesos de adquisición de <br>
                    infraestructura, además de fomentar y desarrollar transparencia.
                </p>
                <p style="font-weight: 600;">
                    CoST representa un mejor valor para las comunidades porque asegura una entrega de infraestructura
                    eficiente en <br>
                    costos y con una mejor calidad, capaz de cambiar vidas. Las comunidades ganan acceso a trabajo y
                    mercados a <br>
                    través de carreteras y calles mejoradas, agua potable limpia, educación en escuelas bien construidas
                    o tratamiento <br>
                    médico en hospitales seguros, entre otras.
                </p>
                <p>
                    Esto ayuda a informar y empoderar a los ciudadanos, permitiéndoles exigirles cuentas a los tomadores
                    de decisiones. <br>
                    Ciudadanos informados e instituciones públicas receptivas pueden liderar la introducción de reformas
                    que reducirán la mala <br>
                    gestión, ineficiencia, corrupción y el riesgo planteado al público como resultado de la mala
                    infraestructura.
                </p>
            </div>
        </div>
    </div>

    <!-- Title - Beneficios -->
    <div class="row mx-0 my-4" id="procesos-de-cost">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-rojo.jpg"); background-repeat: no-repeat;
                background-size: cover;'>Procesos de CoST</h3>
            </div>
        </div>
    </div>

    <!-- Sub-Title - Divulgación -->
    <div class="row mx-0 my-4" id="divulgacion">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-gris.jpg"); background-repeat: no-repeat;
                background-size: 500px; padding-left: 6rem; font-size: 24px;'>Divulgación</h3>
            </div>
        </div>
    </div>

    <!-- Section - Divulgación -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Consiste en garantizar que la información sobre el propósito, alcance, costos y ejecución de los
                    proyectos de infraestructura <br>
                    y obra pública esté abierta y accesible al público, divulgándola de manera oportuna a través de la
                    plataforma de divulgación.
                </p>
            </div>
        </div>
    </div>

    <!-- Sub-Title - Aseguramiento -->
    <div class="row mx-0 my-4" id="aseguramiento">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-gris.jpg"); background-repeat: no-repeat;
                background-size: 500px; padding-left: 6rem; font-size: 24px;'>Aseguramiento</h3>
            </div>
        </div>
    </div>

    <!-- Section - Aseguramiento -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Consiste en avaluar la credibilidad de la información divulgada a dos niveles:
                    <ul class="listStyle">
                        <li class="rojo">
                            <p>A nivel de sector y a nivel de entidad de adquisición, sobre la integridad y exactitud de
                                la información divulgada, y sobre las <br>
                                características generales de desempeño: y</p>
                        </li>
                        <li>
                            <p>A nivel de proyecto, en una pequeña muestra aleatoria, en la cual se resaltan los asuntos
                                que pueden ser potencialmente <br>
                                preocupantes para los actores clave involucrados en los proyectos.</p>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>

    <!-- Sub-Title - Auditoria social -->
    <div class="row mx-0 my-4" id="auditoria-social">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold" style='background-image: url("/assets/img/background-gris.jpg"); background-repeat: no-repeat;
                background-size: 500px; padding-left: 6rem; font-size: 24px;'>Auditoria Social</h3>
            </div>
        </div>
    </div>

    <!-- Section - Auditoria social -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Consiste en trabajar con las partes interesadas para promover los resultados del proceso de
                    seguimiento, con la finalidad <br>
                    de poner los asuntos clave en el dominio público. De esta manera, la sociedad civil, los medios de
                    comunicación y los <br>
                    ciudadanos pueden ser conscientes de los problemas y demandar la rendición de cuentas a los
                    responsables de la toma de <br>
                    decisiones.
                </p>
                <p>
                    La implementación de CoST en Jalisco, pretende mejorar la transparencia en los procesos de
                    infraestructura, mediante el <br>
                    estándar de contrataciones abiertas, cuyos indicadores han sido ajustados por parte de los
                    integrantes del Grupo <br>
                    Multisectorial a los procesos y conceptos utilizados en la entidad, (identificación, preparación,
                    contratación, ejecución y evaluación).
                </p>
                <p>
                    Aunado a ello, se pretende generar capacidades a la sociedad civil para la vigilancia y monitoreo de
                    las obras públicas que <br>
                    encuentren publicadas bajo los entándares antes referidos.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection