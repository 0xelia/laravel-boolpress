<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Poppins', sans-serif;
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

            .title_wrapper{
                overflow: hidden;
                max-width: 600px;
                margin: 0 auto;
            }
            .title {
                font-size: 84px;
                font-weight: 900;
                max-width: 600px;
                transform: translateX(-1000px);
                animation-fill-mode: forwards;
                animation-timing-function: cubic-bezier(0,.63,.34,1.24);
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="bg-blue-500">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right flex gap-8 font-bold text-white">
                    @auth
                        <a href="{{ route('admin.home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title_wrapper">
                    <div class="title animate__animated animate__slideInLeft text-white m-b-md">
                        BOOLPRESS
                    </div>
                </div>

                <ul class="flex gap-24 text-white font-bold">
                    <li>
                        <a href="#">
                            Prova Button
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Prova Button
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Prova Button
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Prova Button
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
