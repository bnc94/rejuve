<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Correo de confirmación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h4 {
            color: #333;
            text-align: center;
            font-size: 20px;
            text-align: left;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .competencia {
            text-transform: capitalize;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por inscribirte!</h1>
        <p>Hola {{$nombre_usuario}} estos son los detalles de tu inscripción.</p>
        <h4 class="competencia">{{$nombre_competencia}}</h4>
        <h4>Pruebas inscritas:</h4>
        @foreach(explode(',', $inscripcion[0]->pruebas) as $index => $item)
            <p>{{ $index + 1 }}. <strong>{{trim($item)}}</strong> </p>
        @endforeach
        <h4>Talla de playera: {{$inscripcion[0]->talla_playera}} </h4>
        <p>Descarga, llena, imprime y entrega la hoja responsiva adjunta el día de la competencia.</p>
        <p>Si tiene alguna duda o necesita asistencia, puede contactarnos a través del correo electrónico [correo electrónico] o al número de teléfono [número de teléfono].</p>
    </div>
</body>
</html>
