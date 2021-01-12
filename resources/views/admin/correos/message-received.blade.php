<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <img src="{{asset('assets/img/cost-logo.jpg')}}" alt="">
    <p>Recibiste un mensaje de: {{ $sms['name']}} - {{ $sms['email']}}</p>

    <p><strong>Asunto: </strong> {{ $sms['subject']}}</p>
    <p><strong>Contenido: </strong> {{ $sms['content']}} </p>
    
</body>
</html>