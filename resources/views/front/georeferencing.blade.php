@extends('front.layouts.app')

@section('title')
Georreferenciación
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<link rel="stylesheet" href="{{asset("css/select2.min.css")}}">
<link href="{{asset("assets/css/georeferencing.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid pt-4">
    <!-- Section - Mapa de la localización -->

    <div id="map" class="row mapa"></div>

    <br class="hidden-desktop">

    <div class="row">
        <div class="col-md-12 bg-gris-phone">
            <form action="{{url('georeferencing')}}" class="formulario-projects-search" method="get">
                <select name="municipio" id="municipio">
                    <option value="">Seleccione entidad o municipio</option>
                    <option value="Acatic">Acatic</option>
                    <option value="Acatlán de Juárez">Acatlán de Juárez</option>
                    <option value="Ahualulco de Mercado">Ahualulco de Mercado</option>
                    <option value="Amacueca">Amacueca</option>
                    <option value="Amatitán">Amatitán</option>
                    <option value="Ameca">Ameca</option>
                    <option value="Arandas">Arandas</option>
                    <option value="Atemajac de Brizuela">Atemajac de Brizuela</option>
                    <option value="Atengo">Atengo</option>
                    <option value="Atenguillo">Atenguillo</option>
                    <option value="Atotonilco el Alto">Atotonilco el Alto</option>
                    <option value="Atoyac">Atoyac</option>
                    <option value="Autlán de Navarro">Autlán de Navarro</option>
                    <option value="Ayotlán">Ayotlán</option>
                    <option value="Ayutla">Ayutla</option>
                    <option value="Bolaños">Bolaños</option>
                    <option value="Cabo Corrientes">Cabo Corrientes</option>
                    <option value="Casimiro Castillo">Casimiro Castillo</option>
                    <option value="Cañadas de Obregón">Cañadas de Obregón</option>
                    <option value="Chapala">Chapala</option>
                    <option value="Chimaltitán">Chimaltitán</option>
                    <option value="Chiquilistlán">Chiquilistlán</option>
                    <option value="Cihuatlán">Cihuatlán</option>
                    <option value="Cocula">Cocula</option>
                    <option value="Colotlán">Colotlán</option>
                    <option value="Concepción de Buenos Aires">Concepción de Buenos Aires</option>
                    <option value="Cuautitlán de García Barragán">Cuautitlán de García Barragán</option>
                    <option value="Cuautla">Cuautla</option>
                    <option value="Cuquío">Cuquío</option>
                    <option value="Degollado">Degollado</option>
                    <option value="Ejutla">Ejutla</option>
                    <option value="El Arenal">El Arenal</option>
                    <option value="El Grullo">El Grullo</option>
                    <option value="El Limón">El Limón</option>
                    <option value="El Salto">El Salto</option>
                    <option value="Encarnación de Díaz">Encarnación de Díaz</option>
                    <option value="Etzatlán">Etzatlán</option>
                    <option value="Guachinango">Guachinango</option>
                    <option value="Guadalajara">Guadalajara</option>
                    <option value="Gómez Farías">Gómez Farías</option>
                    <option value="Hostotipaquillo">Hostotipaquillo</option>
                    <option value="Huejuquilla el Alto">Huejuquilla el Alto</option>
                    <option value="Huejúcar">Huejúcar</option>
                    <option value="Ixtlahuacán de los Membrillos">Ixtlahuacán de los Membrillos</option>
                    <option value="Ixtlahuacán del Río">Ixtlahuacán del Río</option>
                    <option value="Jalostotitlán">Jalostotitlán</option>
                    <option value="Jamay">Jamay</option>
                    <option value="Jesús María">Jesús María</option>
                    <option value="Jilotlán de los Dolores">Jilotlán de los Dolores</option>
                    <option value="Jocotepec">Jocotepec</option>
                    <option value="Juanacatlán">Juanacatlán</option>
                    <option value="Juchitlán">Juchitlán</option>
                    <option value="La Barca">La Barca</option>
                    <option value="La Huerta">La Huerta</option>
                    <option value="La Manzanilla de la Paz">La Manzanilla de la Paz</option>
                    <option value="Lagos de Moreno">Lagos de Moreno</option>
                    <option value="Magdalena">Magdalena</option>
                    <option value="Mascota">Mascota</option>
                    <option value="Mazamitla">Mazamitla</option>
                    <option value="Mexticacán">Mexticacán</option>
                    <option value="Mezquitic">Mezquitic</option>
                    <option value="Mixtlán">Mixtlán</option>
                    <option value="Ocotlán">Ocotlán</option>
                    <option value="Ojuelos de Jalisco">Ojuelos de Jalisco</option>
                    <option value="Pihuamo">Pihuamo</option>
                    <option value="Poncitlán">Poncitlán</option>
                    <option value="Puerto Vallarta">Puerto Vallarta</option>
                    <option value="Quitupan">Quitupan</option>
                    <option value="San Cristóbal de la Barranca">San Cristóbal de la Barranca</option>
                    <option value="San Diego de Alejandría">San Diego de Alejandría</option>
                    <option value="San Gabriel">San Gabriel</option>
                    <option value="San Ignacio Cerro Gordo">San Ignacio Cerro Gordo</option>
                    <option value="San Juan de los Lagos">San Juan de los Lagos</option>
                    <option value="San Juanito de Escobedo">San Juanito de Escobedo</option>
                    <option value="San Julián">San Julián</option>
                    <option value="San Marcos">San Marcos</option>
                    <option value="San Martín de Bolaños">San Martín de Bolaños</option>
                    <option value="San Martín Hidalgo">San Martín Hidalgo</option>
                    <option value="San Miguel el Alto">San Miguel el Alto</option>
                    <option value="San Pedro Tlaquepaque">San Pedro Tlaquepaque</option>
                    <option value="San Sebastián del Oeste">San Sebastián del Oeste</option>
                    <option value="Santa María de los Ángeles">Santa María de los Ángeles</option>
                    <option value="Santa María del Oro">Santa María del Oro</option>
                    <option value="Sayula">Sayula</option>
                    <option value="Tala">Tala</option>
                    <option value="Talpa de Allende">Talpa de Allende</option>
                    <option value="Tamazula de Gordiano">Tamazula de Gordiano</option>
                    <option value="Tapalpa">Tapalpa</option>
                    <option value="Tecalitlán">Tecalitlán</option>
                    <option value="Techaluta de Montenegro">Techaluta de Montenegro</option>
                    <option value="Tecolotlán">Tecolotlán</option>
                    <option value="Tenamaxtlán">Tenamaxtlán</option>
                    <option value="Teocaltiche">Teocaltiche</option>
                    <option value="Teocuitatlán de Corona">Teocuitatlán de Corona</option>
                    <option value="Tepatitlán de Morelos">Tepatitlán de Morelos</option>
                    <option value="Tequila">Tequila</option>
                    <option value="Teuchitlán">Teuchitlán</option>
                    <option value="Tizapán el Alto">Tizapán el Alto</option>
                    <option value="Tlajomulco de Zúñiga">Tlajomulco de Zúñiga</option>
                    <option value="Tolimán">Tolimán</option>
                    <option value="Tomatlán">Tomatlán</option>
                    <option value="Tonalá">Tonalá</option>
                    <option value="Tonaya">Tonaya</option>
                    <option value="Tonila">Tonila</option>
                    <option value="Totatiche">Totatiche</option>
                    <option value="Tototlán">Tototlán</option>
                    <option value="Tuxcacuesco">Tuxcacuesco</option>
                    <option value="Tuxcueca">Tuxcueca</option>
                    <option value="Tuxpan">Tuxpan</option>
                    <option value="Unión de San Antonio">Unión de San Antonio</option>
                    <option value="Unión de Tula">Unión de Tula</option>
                    <option value="Valle de Guadalupe">Valle de Guadalupe</option>
                    <option value="Valle de Juárez">Valle de Juárez</option>
                    <option value="Villa Corona">Villa Corona</option>
                    <option value="Villa Guerrero">Villa Guerrero</option>
                    <option value="Villa Hidalgo">Villa Hidalgo</option>
                    <option value="Villa Purificación">Villa Purificación</option>
                    <option value="Yahualica de González Gallo">Yahualica de González Gallo</option>
                    <option value="Zacoalco de Torres">Zacoalco de Torres</option>
                    <option value="Zapopan">Zapopan</option>
                    <option value="Zapotiltic">Zapotiltic</option>
                    <option value="Zapotitlán de Vadillo">Zapotitlán de Vadillo</option>
                    <option value="Zapotlanejo">Zapotlanejo</option>
                    <option value="Zapotlán del Rey">Zapotlán del Rey</option>
                    <option value="Zapotlán el Grande">Zapotlán el Grande</option>
                </select>
                <div id="loading"></div>
                <select name="id_sector" id="sector">
                    <option value="">Sectores</option>
                </select>
                <div id="loading2"></div>
                <select name="id_subsector" id="sub_sector">
                    <option value="">Subsectores</option>
                </select>
                <div id="loading3"></div>
                <select name="codigo_postal" id="codigo_postal">
                    <option value="">C.P.</option>
                </select>
                {{-- <input type="text" name="presupuesto" placeholder="Presupuesto"> --}}
                <input type="text" name="nombre_proyecto" placeholder="Nombre del proyecto">
                <center>
                    <button type="submit">BÚSQUEDA</button>
                </center>
                <a href="#" class="hidden-phone" style="float: right; color: #2C4143">X</a>
            </form>
        </div>
    </div>
    
    <!-- Section - Datos generales -->
    <div class="row mt-5">
        <div class="col-md-8 px-0 py-1">
            <h3 class="py-2 font-weight-bold" style="background-image: url('/assets/img/project/barra-resultados.png'); background-repeat: no-repeat;
                background-size: cover;">
                <span style="font-weight: 700; margin-left: 115px; color: white;">Resultados</span>
            </h3>
        </div>
    </div>
    <div class="container">

        @foreach ($projects as $project)

        <div class="my-5 secciones-projects">
            <h5><b>{{ $project->title }}</b></h5>
            {{ $project->description }}
            <div class="row mt-3">
                <div class="col-md-12 ">
                    <a href="#" class="links-color">Sector Público</a> <span class="links-color">/</span>
                    <a href="#" class="links-color">Ayuntamiento de Zapopan</a>
                    <a href="{{ route('project-single', $project->id) }}" class="btn-conoce-mas">Conoce más</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
    <br><br class="hidden-phone"><br class="hidden-phone">
</div>

@endsection

@section('scripts')

<script src="{{asset("js/select2.min.js")}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#municipio').select2();
    });
</script>
<script>
    $(document).ready(function(){
        $('#municipio').on('change',function(){
            var municipio_id = $(this).val();
            if ($.trim(municipio_id) != ''){
                $('#loading').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="20" style="margin-left: 45%; margin-top:15px;" />');
                $.get('sectores',{municipio_id:municipio_id}, function (sectores) {
                    $('#loading').fadeIn(700).html('');
                    $('#sector').empty();
                    $('#sub_sector').empty();
                    $('#sub_sector').append("<option value=''>No se encontraron subsectores</option>");
                    $('#sector').append("<option value=''>Seleccione Sector</option>");
                    $.each(sectores, function (index, value){
                        $('#sector').append("<option value='"+index+"'>"+value+"</option>")
                    })
                    
                })
            }
        })
        $('#sector').on('change',function(){
            var sector_id = $(this).val();
            if ($.trim(sector_id) != ''){
                $('#loading2').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="20" style="margin-left: 45%; margin-top:15px;" />');
                $.get('subsectores',{sector_id:sector_id}, function (subsectores) {
                    $('#loading2').fadeIn(700).html('');
                    $('#sub_sector').empty();
                    $('#sub_sector').append("<option value=''>Seleccione subsector</option>");
                    $.each(subsectores, function (index, value){
                        $('#sub_sector').append("<option value='"+index+"'>"+value+"</option>")
                    })
                })
            }
        })
        $('#sub_sector').on('change',function(){
            var sub_sector_id = $(this).val();
            if ($.trim(sub_sector_id) != ''){
                $('#loading3').html('<img src="{{asset('assets/img/project/carga.gif')}}" alt="loading" width="20" style="margin-left: 45%; margin-top:15px;" />');
                $.get('codigo_postales',{sub_sector_id:sub_sector_id}, function (codigo_postales) {
                    $('#loading3').fadeIn(700).html('');
                    $('#codigo_postal').empty();
                    $('#codigo_postal').append("<option value=''>Seleccione codigo postal</option>");
                    $.each(codigo_postales, function (index, value){
                        $('#codigo_postal').append("<option value='"+index+"'>"+value+"</option>")
                    })
                })
            }
        })
    })
</script>

<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script type="text/javascript">
    // listen for screen resize events
    var zona = 0;
    window.addEventListener('load', function(event){
        // get the width of the screen after the resize event
        var width = document.documentElement.clientWidth;
        // tablets are between 768 and 922 pixels wide
        // phones are less than 768 pixels wide
        if (width < 1550) {
            // set the zoom level to 10
            zona = 7;
        }  else {
            // set the zoom level to 8
            zona = 8;
        }

        //Marker icon
        var icon = L.icon({
            iconUrl: '/assets/img/map/marker.png',
            iconSize: [25, 35], // size of the icon
        });

        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, { maxZoom: 14, attribution: osmAttrib }),
            bounds = new L.LatLngBounds(new L.LatLng(22.629, -103.886), new L.LatLng(18.489, -102.940));
  
        var map = new L.Map('map', {
            scrollWheelZoom: false,
            center: bounds.getCenter(),
            zoom: zona,
            layers: [osm],
            maxBounds: bounds
        });
              
        const projects = @json($projects);

        projects.forEach(function(item, index) {
            
            var lat   = item.lat;
            var lng   = item.lng;
            var title = item.title;

            let lat_split = lat.split('|')
            let lng_split = lng.split('|')

            title = title.substr(0, 60) + "...";

            if( lat_split[0] != "" ){
                for(var i=0; i<=lat_split.length; i++){
                    if( lat_split[i] == "" || lat_split[i] == undefined || lat_split[i] == null ){
                        //console.log("Última localización de cada proyecto.")
                    } else {
                        //console.log([lat_split[i], lng_split[i]])
                        console.log(title)
                        L.marker( [lat_split[i], lng_split[i]], {icon: icon} ).addTo(map).bindPopup('<p>' + title +'</p><div class="content-label"><span><img width="15px" src="{{asset("assets/img/project/icons/pen-icon.png")}}"> </span><br><span><img width="15px" src="{{asset("assets/img/project/icons/usuario-icon.png")}}"> </span></div><center><a href="/project-single/'+ item.id +'"><button class="leaflet-btn-detalle-project">Ver detalles</button></a></center>');
                    }
                } 
            }
        }); 
    });
</script>

@endsection