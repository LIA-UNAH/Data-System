<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 20px;
        }

        .nombre-empresa {
            width: 100%;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .saludo {
            font-weight: 500;
            font-size: 18px;
        }

        .cuerpo {
            font-size: 14px;
            text-align: justify;
        }

        .despedida{
            font-size: 14px;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <div class="nombre-empresa">
        {{ config('app.name') }}
    </div>

    <span class="saludo">¡Buen dia estimado(a)!</span>

    <p class="cuerpo">
        {{ $mensaje }}
    </p>

    <br/>
    <br/>

    <span class="despedida">Saludos, {{ config('app.name') }}.</span>
</body>

</html>
