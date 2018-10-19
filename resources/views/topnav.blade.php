<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">FarmRS</a>
  <button onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="navbar-toggler" type="button"  aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-sign-out-alt" style="color: #FFF;"></i>
  </button><!-- data-toggle="collapse" data-target="#navbarColor01" -->

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav navbar-right ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{url("/profile")}}" ><i style="color: #FFF;" class="fa fa-user-circle"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url("/logout")}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt" style="color: #FFF;"></i> Log Out</a>
        <form id="logout-form" action="{{url("/logout")}}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
    
  </div>
</nav>

{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> --}}