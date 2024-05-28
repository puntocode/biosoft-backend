<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Web</title>
    <style>
        body{
            background-color: #f9f9f9;
            font-family: Helvetica, sans-serif;
        }

        .container{
            width: 80%;
            padding: 30px;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #cecece;
            border-top: 10px solid #008f2f;
            border-radius: 10px;
        }
        .row{
        }

        .cabecera{
            text-align: center;
        }

        .cabecera h2{
            color     : #008f2f;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .cabecera h3{
            color        : #6d6c6c;
            margin-top   : 15px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .cabecera img{
            height: 40px;
        }

        .list-group{
            background-color: #ecebeb; 
            border-radius: 10px;
            padding: 25px;
        }

        .list-group-item{
            list-style: none;
            color: #7d7d7d;
            padding-top: 10px;
        }

        @media screen and (max-width: 425px) {
            .container{
                width: 90%;
                padding: 10px;
            }
            .cabecera{
                flex-direction: column-reverse;
                align-items: center;
            }
            ul{
                padding: 15px;
                margin:0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="cabecera">
                <img src="https://www.biolimpieza.com.py/views/img/logo.png" alt="logo de biolimpieza">
                <h3>HAS RECIBIDO UNA CONSULTA DE</h3>
                <h2>{{ $data['subject'] }}</h2>
            </div>
            <ul class = "list-group">
                <li class = "list-group-item"><strong>Nombre:</strong> {{ $data['name'] }}</li>
                <li class = "list-group-item"><strong>Email:</strong> {{ $data['email'] }}</li>
                
                @if (isset($data['phone']))
                    <li class = "list-group-item"><strong>Numero:</strong> {{ $data['phone'] }}</li>
                @endif

                @if (isset($data['city']))
                    <li class = "list-group-item"><strong>Ciudad:</strong> {{ $data['city'] }}</li>
                @endif

                @if (isset($data['address']))
                    <li class = "list-group-item"><strong>Dirección:</strong> {{ $data['address'] }}</li>
                @endif

                @if (isset($data['details']))
                    <li class = "list-group-item"><strong>Detalle:</strong> {{ $data['details'] }}</li>
                @endif

                @if(isset($data['message']))
                    <li class = "list-group-item"><strong>Mensaje:</strong> {{ $data['message'] }}</li>
                @endif

                @if(isset($data['plan']))
                    <li class = "list-group-item"><strong>Mensaje:</strong> {{ $data['plan'] }}</li>
                @endif

                @if(isset($data['question']))
                    <li class = "list-group-item"><strong>Consulta:</strong> {{ $data['question'] }}</li>
                @endif
            </ul>
        </div>
    </div>
</body>
</html>