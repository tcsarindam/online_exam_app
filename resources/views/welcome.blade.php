<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Exam App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 95vh;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .welcome_container{

                width: 80%;
                height: 450px;
                margin-left: 2%;
                margin-top: 10px;
                background:url('uploads/images/login-register.jpg');
                font-weight: bold;
                font-size: 1.6em;
                color: green;
                font-family: Arial;
                
            }

            .welcome_container h1{
                line-height: 350px;
                text-align: center;
            }
            
        </style>
    </head>
    <body>
    <section>
        <div class="container">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Admin Login</a></li>
                            <!--<a href="{{ route('register') }}">Register</a>-->
                            <a href="{{ url('portal/login') }}">Portal Login</a>
                            <a href="{{ url('student/signup') }}">Student Login</a>
                        @endauth
                    </div>
                @endif
                <div class="welcome_container">
                      <h1>ONLINE&nbsp;&nbsp;&nbsp;&nbsp;EXAM&nbsp;&nbsp;&nbsp;&nbsp;SYSTEM</h1>
                </div>

            </div>
            <div class="footer" style="text-align: center; line-height: 1px;">
                <h5>Copyright@Blue Krystal Technologies-2021</h5>
            </div>
        </div>
    </section>
    </body>
</html>
