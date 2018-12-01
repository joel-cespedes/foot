
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <title>FacilFood</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            color:#73879C;
        }
        body {
            background-color: #F7F7F7;
            font: normal 25px Helvetica, Arial, sans-serif;

        }
        .centro {width: 350px; margin: auto; display: flex;align-items: center; height: 100vh; justify-content: center}
        .cabeza {width: 100%;}
        .cabeza h1 {
            font: normal 25px Helvetica, Arial, sans-serif;
            letter-spacing: -0.05em;
            line-height: 20px;
            margin: 10px 0 30px;
            text-align: center;
            position: relative;
        }
        .cabeza h1:before, .cabeza h1:after{
            content: "";
            height: 1px;
            position: absolute;
            top: 10px;
            width: 15%;
        }
        .cabeza h1:after {
            background: rgb(126,126,126);
            background: -moz-linear-gradient(left,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
            background: -webkit-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: -o-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: -ms-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            right: 0;
        }
        .cabeza h1:before {
            background: rgb(126,126,126);
            background: -moz-linear-gradient(right,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
            background: -webkit-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: -o-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: -ms-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            background: linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
            left: 0;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form .group_email {
            margin: .5em 0;
        }
        input {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
            -moz-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
            -ms-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
            -o-box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,0.08) inset;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            border: 1px solid #c8c8c8;
            color: #777;
            margin: 0 0 20px;
            width: 100%;
            padding: .4em;
            box-sizing: border-box;
            background: #fff;
        }
        input:focus {
            background-color: white;
        }
        button {
            background-color: white;
            width: 100%;
            padding: .4em;
            cursor: pointer;
            border: 1px solid #c8c8c8;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px; transition: all .3s;
        }
        button:hover { background-color: #eee;}
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 1em;

        }.alert-danger div { color: #6c6c6c !important;
             font-size: .7em;}
        .final {margin-top:1em; border-top: 1px solid #b5b5b5;}
        .final .tis{ margin-top: 1em; font-size: .6em;text-align: center;}
        .final p { margin-top: 1em; font-size: .5em; text-align: center;}
        .logo {width: 100px; margin: 2em auto 0 auto;}
        .logo img {width: 100%;}

    </style>
</head>
<body>

<div class="centro">
    <div class="cabeza">
        <h1>Resetear Contraseña</h1>

        <div class="form">
            <form action="{{ route('password.email') }}" method="post">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                {{ csrf_field() }}
                <div class="group_email">
                    <input type="text" name="email" value="{{ old('email') }}"  placeholder="email">
                </div>
                <div class="boton">
                    <button type="submit"> Enviar Email</button>
                </div>
            </form>
        </div>
        <div class="logo">
            <img src="{{asset('admin/images/logo_original.png')}}" alt="Administrativo">
        </div>
        <div class="final">
            <div class="tis">ADMINISTRATIVO</div>
            <p>{{date('Y')}} Todos los derechos reservados. <br><br><a href="http://socialestrategia.com">Social Estrategia</a></p>
        </div>
    </div>
</div>

</body>
</html>
