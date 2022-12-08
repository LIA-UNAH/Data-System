<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        font-size: 62.5%;
    }

    body {
        padding: 10px 50px;
        font-size: 1.6rem;
    }

    .titulo {
        width: 100%;
        text-align: center;
    }

    table {
        table-layout: fixed;
        width: 100%;
        margin-top: 1rem;
        border-collapse: collapse;
    }

    .table-p{
        text-align: center;
    }

    .table-td-big{
        padding: 20px 20px;
    }

</style>

<body>
    <div>
        <table width="100%">
            <tr>
                <td style="width: 15%" rowspan="2">
                    <img width="100px" src="data:image/png;base64,{{$logo_empresa}}" alt="logo-empresa">
                </td>
                <td>
                    <strong>Data System's Alekisa</strong>
                    <br>
                    <strong>Barrio el centro, la esperanza intibucá frente a emprededores Agricolas</strong> 
                </td>
            </tr>
        </table>

        <hr>

        <table>
            <tr>
                <td><img width="20px" src="data:image/png;base64,{{$logo_whatsapp}}" alt="logo-whatsapp">+ 504 9783-5101 o + 504 3204-2936</i> </td>
                <td>Fecha: {{now()->toDateString('Y-m-d')}}</td>
            </tr>
            <tr>
                <td>10011994001502</td>
            </tr>
        </table>
        
        <br>

        <h1 style="width: 100%;text-align: center;font-size: 24px;text-decoration: underline;">Ficha de Ingreso de Producto</h1>

        <table>
            <tr>
                <td>
                    <strong>Fecha de ingreso: </strong>
                    <span>{{$reparacion->fecha_entrada}}</span>
                </td>
                <td>
                    <strong>Fecha de entrega: </strong>
                    <span>{{$reparacion->fecha_salida}}</span>
                </td>
                <td>
                    <strong>Hora de entrega: </strong>
                    <span>{{$reparacion->hora_salida}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Marca: </strong>
                    <span>{{$reparacion->marca}}</span>
                </td>
                <td>
                    <strong>Modelo: </strong>
                    <span>{{$reparacion->modelo}}</span>

                </td>
                <td>
                    <strong>Cliente: </strong>
                    <span>{{$reparacion->cliente->name}}</span>

                </td>
            </tr>
        </table>
        
        <br>

        <span>
            <strong>Descripción:</strong>
        </span>

        <br>

        <p>
           {{$reparacion->descripcion}}
        </p>
        <br>
        <table>
            <tr>
                <td>
                    <strong style="font-size: 18px;">Total a pagar: </strong>
                    <span>L {{$reparacion->costo_reparacion}}</span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>