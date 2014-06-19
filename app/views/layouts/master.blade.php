<?php

//$user = User::find(Auth::user()->id);
//$user_id = $user->id;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Web Page!</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   @yield('head')
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Web Page!</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
  
			<li class="dropdown">
			
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Your Stuff<b class="caret"></b></a>
			              <ul class="dropdown-menu">

							<li class="dropdown-header">Your Stuff</li>
			           
							<li role="presentation" class="divider"></li>	
							<li><a role="menuitem" href=""><i>Other Stuff</i></a></li>
			              </ul>
			            </li>
					
			
          </ul>
		  <ul class="nav navbar-nav navbar-right">
				<li><a id="logged_in_as">Logged in as: <?php // $name = Auth::user()->username; echo $name; ?></a></li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
	</div>

	
   

    <div class="container-fluid" style="">
     @yield('content')
    
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<script>
	</script>
	
	@yield('javascript')
  </body>
</html>
