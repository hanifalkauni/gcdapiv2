<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GCD Web Service</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                            GCD Web Service
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        function getNow(){
            $.ajax({
                url:'{{route('getAccessToken')}}',
		        type:'post',
                dataType: 'json',
                headers:{
                    apiKey:'{{ env('API_KEY', 'Laravel') }}',
                    accessToken:'e0314da9ee1913e979fd162c3cb6ec43'
                },
                data: {
                    userId:{{Auth::id()}}
                },

                success:function(result){
                    if(result.data.users){
                    var accesstoken=result.data.users.accessToken;
                    $('.accesstoken').html(`
				    Here your accessToken : <code>`+accesstoken+`</code>
			        `)
                    }
                    else{
                        $('.accesstoken').html(`
                    you havent access token yet<br>
				    Generate your access token <a href="#" class="tombol" id="tombol">here</a>
			        `)  
                    }
                },
                error:function(){
                    $('.accesstoken').html(`
                    you havent access token yet<br>
				    Generate your access token <a href="#" class="tombol" id="tombol">here</a>
			        `)
                }
            });
        }

        function getAccessToken(){
            $.ajax({
                url:'{{route('generateAccessToken')}}',
		        type:'post',
                dataType: 'json',
                headers:{
                    apiKey:'{{ env('API_KEY', 'Laravel') }}',
                },
                data: {
                    userId: {{Auth::id()}},
                    deviceId:{{Auth::id()}},
                    deviceType: 2,
                    deviceToken: Math.floor(Math.random() * 1000000)

                },

                success:function(result){
                    if(result.data.users){
                    var accesstoken=result.data.users.accessToken;
                    $('.accesstoken').html(`
				    Here your accessToken : <code>`+accesstoken+`</code>
			        `)
                    }
                    else{
                        $('.accesstoken').html(`
                    you havent access token yet<br>
				    Generate your access token <a href="#" class="tombol" id="tombol">here</a>
			        `)  
                    }
                },
                error:function(){
                    $('.accesstoken').html(`
                    you havent access token yet<br>
				    Generate your access token <a href="#" class="tombol" id="tombol">here</a>
			        `)
                }
            });
        }

        $(document).ready(function(){
	        getNow();
        });

        $('.accesstoken').on('click','.tombol',function(){
            getAccessToken();
        });
    </script>
</body>
</html>
