<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%;
            background: #ffffff;
            text-align: center;
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
            font-weight: 600;
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
        <h1>Certificado de Tiempos</h1>
        <p>a nombre de:</p>
        <h1>{{$nombre}}</h1>
        <p>Obtenidos en la competencia <span class="competencia">{{$competencia}}</span> que se celebró del <span class="competencia">{{$fechaInicio}}</span> al <span class="competencia">{{$fechaFinal}}</span> </p>
    </div>
</body>
</html>
