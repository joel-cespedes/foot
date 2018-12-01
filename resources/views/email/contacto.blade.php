<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Correo Facilfood</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: tahoma;
            list-style: none;
        }

        * a {
            text-decoration: none;
        }

        .mail {
            background-color: #fff;
            box-shadow: 0 0 25px rgba(200, 200, 200, 0.5);
        }

        .mail .space-logo-top {
            width: 100%;
            margin-bottom: 3em;
            background-color: #00ab00;
            padding: 2em 1em;
            box-sizing: border-box;

        }

        .mail .space-logo-top .box-logo {
            width: 80px;
            margin: 0 auto;
        }

        .mail .space-logo-top .box-logo img {
            width: 100%;
        }

        .mail .contenido-mail {
            padding: 1em;
            min-height: 500px;
        }

        .mail .contenido-mail h1 {
            margin-bottom: 1.5em;
            color: #00ab00;
        }

        .mail .contenido-mail h3 {
            margin-bottom: 1.5em;
            color: #393939;
        }

        .mail .contenido-mail h3 span {
            margin-left: .5em;
        }

        .mail .contenido-mail p {
            margin-bottom: 1em;
            color: #393939;
            text-align: justify;
        }

        .mail .contenido-mail .line-correo span {
            font-weight: bold;
        }

        .mail .footr-mail {
            background-color: #00ab00;
            padding: 0.5em 1em;
            color: white;
            text-align: center;
        }

        .mail .footr-mail .line1 {

        }

        .mail .footr-mail .line1 p {
            font-size: .8em;
        }

        .mail .footr-mail .line1 h4 {
            margin-bottom: .3em;
        }

        .mail .footr-mail .line2 {
            margin-bottom: .3em;
        }

        .mail .footr-mail .line2 a {
            color: white;
            font-size: .7em;
        }

        .mail .footr-mail .line2 span {
            margin: 0 1em;
        }
    </style>
</head>
<body>
<section class="mail">
    <div class="space-logo-top">
        <div class="box-logo">
            <img src="{{asset('img/logo.png')}}" alt="FacilFood">
        </div>
    </div>
    <div class="contenido-mail">
        <h1>Email de contacto</h1>
        <div class="line-correo">
            <p> <span>Nombre:</span>  {{$nombre}}</p>
        </div>
        <div class="line-correo">
            <p> <span>Teléfono: </span>{{$telefono}}</p>
        </div>
        <div class="line-correo">
            <p> <span>Asunto: </span>{{$asunto}}</p>
        </div>
        <div class="line-correo">
            <p> <span>Correo: </span>{{$email}}</p>
        </div>
        <div class="line-correo">
            <p> <span>Mensaje: </span>{{$mensaje}}</p>
        </div>
    </div>
    <div class="footr-mail">
        <div class="line1">
            <p>Atentamente</p>
        </div>
        <div class="line2"><a href="#">Facilfood.cl</a></div>
    </div>
</section>
</body>
</html>
