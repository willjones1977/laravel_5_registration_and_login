<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
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
                font-size: 36px;
            }
        </style>
	</head>
	<body>
		<div class="container">
			<div class="">
            <?php   if(Auth::check() ): ?>
                        <a href="/auth/logout" style="float: right">Logout</a>
                        <a href="home" style="float: right; padding-right: 10px;">Home</a>
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
	                <div class="title">forum.home</div>
	           </div>
	            
	        </div>
			@yield('content')
			<hr>	
		</div>
	</body>
</html>

