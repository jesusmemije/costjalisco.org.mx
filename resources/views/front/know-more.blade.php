@extends('front.layouts.app')

@section('title')
Conoce más
@endsection

@section('content')

<style>
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

    @media only screen and (max-width: 480px) {
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
    }

</style>

<div class="main">
    <!-- Title - ¿Qúes es CoST? -->
    <div class="row mx-0 my-4" id="que-es-cost">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">¿Qué es CoST?</h3>
            </div>
        </div>
    </div>

    <!-- Section - Descripción CoST -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>CoST se lanzó desde el Reino Unido como una inicialiva global en 2012 con el apoyo del Banco Mundial
                    surgió de las <br class="hidden-desktop-mini">
                    lecciones aprendidas de un programa piloto de tres años que probó la viabilidad de un nuevo proceso
                    de transparencia y <br class="hidden-desktop-mini">
                    responsabilidad en la infraestructura pública en ocho países.</justify>

                </p>
                <p style="font-weight: 600;">
                    <justify>Actualmente CoST trabaja globalmente con miembros distribuidos en 15 países de cuatro continentes,
                    sus <br class="hidden-desktop-mini">
                    miembros son de gobiernos subnacionales y nacionales y representan economías emergentes y de bajos
                    ingresos e <br class="hidden-desktop-mini">
                    incluyen cinco Estados frágiles y afectados por conflictos.
                    </justify>
                </p>
                <p>
                    <justify>Además, colabora internacionalmente con organizaciones clave en materia de transparencia y en el
                    combate a la corrupción <br class="hidden-desktop-mini">
                    para facilitar el intercambio global de experiencias y conocimientos sobre transparencia y
                    responsabilidad en la <br class="hidden-desktop-mini">
                    infraestructura pública. Entre los socios internacionales de CoST están: Article 19, Open
                    Contracting Partnership, <br class="hidden-desktop-mini">
                    Transparency International, Open Government Partnership e Hivos.</justify>
                </p>
                <p style="font-weight: 600;">
                   <justify> Esta Iniciativa trabaja con el Gobierno, la Industia y la sociedad civil para promover le
                    divulgación, validación e <br class="hidden-desktop-mini">
                    interpretación de datos de proyectos de infraestructura.</justify>
                </p>
                <p>
                    <justify>CoST tiene una trayectoria en ahorros de costos, reformas legales e institucionales y en el
                    desarrollo de capacidades de <br class="hidden-desktop-mini">
                    grupos interesados. Esto hace que la iniciativa esté idealmente posicionado para dirigir esfuerzos
                    futuros de aumento de la <br class="hidden-desktop-mini">
                    transparencia, rendición de cuentas, así como la mejora en el costo/efectividad en la entrega de la
                    infraestructura pública.</justify>
                </p>
                <p>
                    <justify>Dentro de su estructura, la Junta de CoST Internacional es responsable de gobernar la iniciativa:
                    entre sus tareas se <br class="hidden-desktop-mini">
                    encuentran; el aprobar la estrategia y los presupuestos, establecer los principios y los estándares
                    para la participación y la <br class="hidden-desktop-mini">
                    admisión de nuevos países a la iniciativa de CoST. <span style="font-weight: 600;">La Junta nombra
                        una Secretaria Internacional para proveer apoyo <br class="hidden-desktop-mini">
                        administrativo para el prograrna internacional de CoST, apoyar a los países interesados en
                        unirse a CoST, proveer <br class="hidden-desktop-mini">
                        guía y asistencia técnica a los programas nacionales y administrar fondos
                        internacionales.</justify></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Title - Beneficios -->
    <div class="row mx-0 my-4" id="beneficios">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">Beneficios</h3>
            </div>
        </div>
    </div>

    <!-- Section - Beneficios -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>CoST representa un mejor valor para los gobiernos porque demuestra cómo se gasta el dinero público,
                    identifica los <br class="hidden-desktop-mini">
                    potenciales ahorros eficientes y complementa las reformas en la gestión de finanzas públicas y
                    procesos de adquisición de <br class="hidden-desktop-mini">
                    infraestructura, además de fomentar y desarrollar transparencia.</justify>
                </p>
                <p style="font-weight: 600;">
                    <justify>CoST representa un mejor valor para las comunidades porque asegura una entrega de infraestructura
                    eficiente en <br class="hidden-desktop-mini">
                    costos y con una mejor calidad, capaz de cambiar vidas. Las comunidades ganan acceso a trabajo y
                    mercados a <br class="hidden-desktop-mini">
                    través de carreteras y calles mejoradas, agua potable limpia, educación en escuelas bien construidas
                    o tratamiento <br class="hidden-desktop-mini">
                    médico en hospitales seguros, entre otras.</justify>
                </p>
                <p>
                    <justify>Esto ayuda a informar y empoderar a los ciudadanos, permitiéndoles exigirles cuentas a los tomadores
                    de decisiones. <br class="hidden-desktop-mini">
                    Ciudadanos informados e instituciones públicas receptivas pueden liderar la introducción de reformas
                    que reducirán la mala <br class="hidden-desktop-mini">
                    gestión, ineficiencia, corrupción y el riesgo planteado al público como resultado de la mala
                    infraestructura.</justify>
                </p>
            </div>
        </div>
    </div>

    <!-- Title - Beneficios -->
    <div class="row mx-0 my-4" id="procesos-de-cost">
        <div class="col-md-6 px-0">
            <div class="text-center text-white">
                <h3 class="py-2 font-weight-bold title-barra-roja">Procesos de CoST</h3>
            </div>
        </div>
    </div>

    <!-- Sub-Title - Divulgación -->
    <div class="row mx-0 my-4" id="divulgacion">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Divulgación</h3>
            </div>
        </div>
    </div>

    <!-- Section - Divulgación -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>Consiste en garantizar que la información sobre el propósito, alcance, costos y ejecución de los
                    proyectos de infraestructura <br class="hidden-desktop-mini">
                    y obra pública esté abierta y accesible al público, divulgándola de manera oportuna a través de la
                    plataforma de divulgación.</justify>
                </p>
            </div>
        </div>
    </div>

    <!-- Sub-Title - Aseguramiento -->
    <div class="row mx-0 my-4" id="aseguramiento">
        <div class="col-md-6 px-0">
            <div class="text-white">
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Aseguramiento</h3>
            </div>
        </div>
    </div>

    <!-- Section - Aseguramiento -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>Consiste en avaluar la credibilidad de la información divulgada a dos niveles:</justify>
                    <ul class="know-more-list">
                        <li class="rojo">
                            <p><justify>A nivel de sector y a nivel de entidad de adquisición, sobre la integridad y exactitud de
                                la información divulgada, y sobre las <br class="hidden-desktop-mini">
                                características generales de desempeño: y </justify></p>
                        </li>
                        <li>
                            <p><justify>A nivel de proyecto, en una pequeña muestra aleatoria, en la cual se resaltan los asuntos
                                que pueden ser potencialmente <br class="hidden-desktop-mini">
                                preocupantes para los actores clave involucrados en los proyectos.</justify></p>
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
                <h3 class="py-2 font-weight-bold subtitle-barra-gris">Auditoria Social</h3>
            </div>
        </div>
    </div>

    <!-- Section - Auditoria social -->
    <div class="container mb-md-5">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <justify>Consiste en trabajar con las partes interesadas para promover los resultados del proceso de
                    seguimiento, con la finalidad <br class="hidden-desktop-mini">
                    de poner los asuntos clave en el dominio público. De esta manera, la sociedad civil, los medios de
                    comunicación y los <br class="hidden-desktop-mini">
                    ciudadanos pueden ser conscientes de los problemas y demandar la rendición de cuentas a los
                    responsables de la toma de <br class="hidden-desktop-mini">
                    decisiones.</justify>
                </p>
                <p>
                    <justify>La implementación de CoST en Jalisco, pretende mejorar la transparencia en los procesos de
                    infraestructura, mediante el <br class="hidden-desktop-mini">
                    estándar de contrataciones abiertas, cuyos indicadores han sido ajustados por parte de los
                    integrantes del Grupo <br class="hidden-desktop-mini">
                    Multisectorial a los procesos y conceptos utilizados en la entidad, (identificación, preparación,
                    contratación, ejecución y evaluación).</justify>
                </p>
                <p>
                    <justify>Aunado a ello, se pretende generar capacidades a la sociedad civil para la vigilancia y monitoreo de
                    las obras públicas que <br class="hidden-desktop-mini">
                    encuentren publicadas bajo los entándares antes referidos.</justify>
                </p>
            </div>
        </div>
    </div>

</div>

@endsection