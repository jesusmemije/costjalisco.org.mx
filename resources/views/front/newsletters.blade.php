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
    background-image: url("assets/img/newsletters/background-red.png");
    
    
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

</style>

<div class="container-fluid">
        <div class="row">
        <div class="col-md-6 boletin">
           <span>Boletines</span>

         
        </div>   
        </div>

        <div class="row">

        <div class="col-md-3 px-0">
            <img src="{{ asset('assets/img/project/proyecto-2.jpg') }}" style="width: 100%; height:295px;" alt="">
        </div> 

        <div class="media-body" style="background-color: #d8d8cd; margin-top:1%;">

        <div class="col-md-12" style="background-color:#628EA0; color:#fff; padding:5%;">
            <span style="font-size:25px;">Transferencia y rendición de cuentas en infraestructura pública, promovida a través de iniciativa CoST e ITEI en el estado de Jalisco.</span>
        </div>

        <div class="col-md-8 date">
          15 de Octubre del 2020
        </div>

        </div>


        </div>

        <div class="container" style="margin-top:2%; margin-bottom:4%;">
            
        <div>contenido boletín

            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel sit suscipit quod, ipsa dolor doloribus repellendus. Ducimus, quam tempora dolor, nesciunt fugit saepe iusto, provident voluptate unde nisi facere deserunt.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quae minus animi accusantium soluta, magni labore doloribus dignissimos repellat ipsam enim velit distinctio veniam voluptatibus asperiores officia modi veritatis atque?
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni, quibusdam. Laboriosam expedita, soluta dignissimos quidem, vitae eligendi dicta explicabo sequi odit ex amet voluptates voluptas architecto mollitia quod adipisci facere.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste iure laborum mollitia sapiente, ullam laboriosam deleniti architecto cum error facilis recusandae similique voluptatum fuga hic eum laudantium est id veritatis.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum repellat quas pariatur amet. Harum corrupti vero dignissimos id doloribus, quidem quo delectus nesciunt odio ratione veritatis illum doloremque quaerat rerum!
            <br><br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo distinctio consectetur nihil laboriosam dolorem omnis sunt rem ut minima vel? Totam labore nemo earum eaque nihil officia. Doloribus, veniam odit.
        </div>
        <div class="d-flex justify-content-end ver">
            <div><button class="btn btn-dark btn-sm">Ver más</div>
            

          

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