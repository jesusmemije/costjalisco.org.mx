<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boletines</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $sms['name']}} - {{ $sms['email']}}</p>
    
    <p><strong>Asunto: </strong> {{ $sms['subject']}}</p>
    
    {{-- <p><strong>Contenido: </strong> --}}
    <div style="background: #628EA0; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; text-align: justify; color: #fff">
        <h2>{{ $sms['titulo']}}</h2>
    </div>
    <div style="background: #d8d8cd; padding-left: 50px; padding-top: 5px; padding-bottom: 10px; text-align: justify; color: #000">
        <h3>{{ $sms['fecha']}}</h3>
    </div>   
    <div style=" word-wrap: break-word; padding:20px 40px 40px 40px; text-align: justify">
           
        @php
            echo $sms['content'];
        @endphp
    </div>
    <div>
        <a href="{{$sms['url']}}">Ver en el sitio</a>
    </div>
</body>
</html>