<!DOCTYPE html>
<html>
	<head>
		<!-- <meta http-equiv="refresh" content="3"> -->
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<!-- jQuery -->
			<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
		<!-- Bootstrap -->
			<link href="{{	URL::asset('bootstrap-3.3.5-dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="{{ URL::asset('bootstrap-3.3.5-dist/js/bootstrap.js') }}"></script>
        <!-- jQueryUI -->
            <link href="{{  URL::asset('jqueryui/jquery-ui.css') }}" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="{{ URL::asset('jqueryui/jquery-ui.js') }}"></script>
		<style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Arial';
            }

            .container {
                margin-left: 100px;
                margin-right: 100px;
                vertical-align: middle;
                /* border: 1px solid; */
            }

            .content {
             
            }

            .title {
                font-size: 24px;
            }
        </style>
	</head>
	<body>
		<div class="container">
			<div class="">
            <?php   if(Auth::check() ): ?>
                        @include('auth.loggedInInfo')

                        <a href="/auth/logout" style="float: right">Logout</a>

                        <a href="/home" style="float: right; padding-right: 10px;">Home</a>
                        <a href="/todo" style="float: right; padding-right: 10px;">To Do</a>
                        <div style="clear: both"></div>
            <?php   else:   ?>
                        <a href="/auth/login" style="float: right">
                            Login
                        </a>
                        <a href="/auth/register" style="float: right; padding-right: 10px;">
                            Register
                        </a>
                        <div style="clear: both"></div>
            <?php   endif;  ?>
        </div>
			<div class="">
	            <div class="content" style="border-bottom: 2px solid">
	                <div class="title">process mgr</div>
	           </div>
	            
	        </div>
			@yield('content')
			<hr>	
		</div>
	</body>
</html>

