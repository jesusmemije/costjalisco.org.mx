@extends('front.layouts.app')


@section('content')

<style>

.date{
    margin-top:3%; color:#fff; 
    padding: 1% 0px 1% 5%;
    margin-bottom:3%;
    background-repeat:no-repeat;
    background-image: url("assets/img/newsletters/background-title.png");
}

.boletin{

    margin-top: 2%;
   
    margin-bottom:5%;
    color:#fff;
    font-size:30px;
    background-repeat:no-repeat;
    background-image: url("assets/img/titulo.png");
    
    
}
.boletin span{

  
    padding-left:38%;
}
.ver{
    margin-top: 3%;
    margin-right:4%;
}
.ver button{
    font-weight: 600;
    border-radius:30px;
    width: 180%;
    box-shadow: 4px 4px 0px 0px #a9b4b7;

    
}
.content{
    text-align: justify;
}

</style>

<div class="container-fluid">
        <div class="row">
        <div class="col-md-6 boletin">
           <span>Boletines</span>

         
        </div>   
        </div>

        <div class="row">

        <div class="col-md-3 px-0">
            <img src="{{ asset($boletin->img_rute) }}" style="width: 100%; height:295px;" alt="">
        </div> 

        <div class="media-body" style="background-color: #d8d8cd; margin-top:1%;">

        <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:5%;">
            <span style="font-size:25px;">{{ $boletin->title}}</span>
        </div>

        <div class="col-md-8 date">
            @if (empty($boletin->date))
            <center>No hay fecha</center>
        @else
            @php
                setlocale(LC_TIME, "spanish");
                $mi_fecha = $boletin->date;
                $mi_fecha = str_replace("/", "-", $mi_fecha);			
                $Nueva_Fecha = date("d-M-Y", strtotime($mi_fecha));	
                $fecha_correcta = strftime("%d de %B de %Y", strtotime($Nueva_Fecha));

                // echo $Mes_Anyo;
            @endphp
            {{ $fecha_correcta }}
            
        @endif
        </div>

        </div>


        </div>

        <div class="container content" style="margin-top:2%; margin-bottom:4%; word-wrap: break-word;">
            @php
                echo $boletin->content;
            @endphp
        </div>
        <div class="d-flex justify-content-end ver">
            {{-- <div><button class="btn btn-dark btn-sm">Ver más</div> --}}
            

          

            </button>
            <div style="padding-top:2%;margin-left:4%;" >
            <img src="assets/img/newsletters/clic.png" height="50" alt=""> 
            </div>
           


        </div>
        
      
</div>

@endsection

@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHzvoUaKDOaWGOu0ZNUpB_SJigsBgOOzI&callback=initMap&libraries=places&v=weekly&language=mx&region=MX"
    defer></script>

<script>
    window.smoothScroll = function(target) {
        var scrollContainer = target;
        do { //find scroll container
            scrollContainer = scrollContainer.parentNode;
            if (!scrollContainer) return;
            scrollContainer.scrollTop += 1;
        } while (scrollContainer.scrollTop == 0);
        
        var targetY = 0;
        do { //find the top of target relatively to the container
            if (target == scrollContainer) break;
            targetY += target.offsetTop;
        } while (target = target.offsetParent);
        
        scroll = function(c, a, b, i) {
            i++; if (i > 30) return;
            c.scrollTop = a + (b - a) / 30 * i;
            setTimeout(function(){ scroll(c, a, b, i); }, 20);
        }
        // start scrolling
        scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
    }
        let map;
    
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }
</script>
@endsection