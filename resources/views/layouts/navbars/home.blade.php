<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Train Tracking System</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route("dashboard")}}">Dashboard</a>
            </li>             
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route("home")}}">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route("createPassenger")}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("login")}}">Login</a>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>