<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Train Tracking System</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset("homepublic/vendor/bootstrap/css/bootstrap.min.css")}}"/>
    

    <!-- Custom fonts for this template -->
    <link type="text/css" rel="stylesheet" href="{{asset("homepublic/vendor/font-awesome/css/font-awesome.min.css")}}"/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link type="text/css" rel="stylesheet" href="{{asset("homepublic/css/clean-blog.min.css")}}"/>

  </head>

  <body>

    @include('layouts.navbars.home')

    <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('homepublic/img/bullet.jpg')}})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            @yield('content')
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p class="copyright text-muted">Copyright &copy; Train Tracking System</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset("homepublic/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("homepublic/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset("homepublic/js/clean-blog.min.js")}}"></script>

  </body>

</html>
