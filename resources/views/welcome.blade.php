<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Freeler</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}
        <link href="https://fonts.googleapis.com/css?family=Cairo|Signika" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                
                background-color: rgb(42, 1, 119);
                color: #ff7100;
                /* font-family: 'Nunito', sans-serif; */
                /* font-family: 'Baloo Thambi', cursive; */
                
                font-family: 'Signika', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: 'Cairo', sans-serif;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href="/login">Ingresar</a>
                    
                </div>
            
            <div class="content">
                <div class="title m-b-md">
                    Freeler
                </div>

                <div class="links">
                    <a href="#">Acerca de Nosotros</a>
                    <a href="#">Contáctanos</a>
                </div>
            </div>
        </div>
    </body>
</html>
