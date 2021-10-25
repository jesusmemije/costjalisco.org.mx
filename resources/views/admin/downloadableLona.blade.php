<script src="http://costjalisco.org.mx/js/html2canvas.js" type="text/javascript"></script> 
<?php


$parte1=$_GET['qr'];
$parte2=$_GET['cht'];
$parte3=$_GET['chl'];
$parte4=$_GET['choe'];
$qr=$parte1."&cht=".$parte2."&chl=".$parte3."&choe=".$parte4;
//print_r($lng);

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lona Cost</title>
   


    <style>
     body{
  width: 100%;
  height: 100%;
}

#titulo-obra{
    width: 700px;
    font-family: Arial, Helvetica, sans-serif;
    
    color: white;
    position: absolute;
    top: 55px;
    left: 20px;
}
#titulo{
  font-weight: bold; 
}
#imagen-obra{
    position: absolute;
    top: 350px;
    left: 230px;
}
#qr-obra{
    position: absolute;
    top: 790px;
    left: 490px;
}
.base{
    background-image: url("http://costjalisco.org.mx/admin_assets/img/LONA FINAL COST 3.5 x 2.5 M.jpg");
    background-repeat: no-repeat;
    background-size: cover;
   width: 100%;
   height: 1000px;
}
    </style>

</head>
<input id="longitud" value="<?php echo $lng; ?>"  hidden/>

<body style="text-align:center">

    <div id="htmltoimage" class="base">

    <div id="titulo-obra">
    <label id="titulo" for="">{{$project->title}}</label>

    </div>
   
   <div id="imagen-obra">
   <img src="{{$ruta}}" height="120" alt="">
   </div>

   <div id="qr-obra">
   <img src="{{$qr}}" height="150" width="150" alt="">
   </div>
    
       
    <button onclick="downloadimage()" id="adios" class="clickbtn">Descargar imagen</button>

    </div>

</body>

    <script type="text/javascript">

        function downloadimage() {
            document.getElementById('adios').style.display="none";
            //var container = document.getElementById("image-wrap"); //specific element on page
            var container = document.getElementById("htmltoimage"); // full page 
            html2canvas(container, { allowTaint: true,scale: 2,quality:2,}).then(function (canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "html_image.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();
            });
        }

    </script>


    <script>

    var element=document.getElementById('longitud');

    if(element.value<=105){
        $('#titulo').css('font-size',"45px");    
        console.log("1");
    }
    if(element.value<213){
        $('#titulo').css('font-size',"30x");    
        console.log("2");
    }
    if(element.value>=213){
        $('#titulo').css('font-size',"26px");    
        console.log("3");
    }
    if(element.value>=300){
        $('#titulo').css('font-size',"20px");    
        console.log("4");
    }
    if(element.value>500){
        $('#titulo').css('font-size',"10px");  console.log("5");
    }

    
    </script>

</html>