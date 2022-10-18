<div class="input-group">
    <a class="navbar-brand" href="#"> <img class="me-3 me-md-5" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/logo.svg"></img></a>
    <!--LOGO!-->

    <input type="text" id="input-form" class="form-control" placeholder="Search" aria-label="Text input with dropdown button">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All type</button>
    <button class="btn btn-primary d-none d-lg-block"><i class="fa-solid fa-magnifying-glass rounded d-none d-lg-block"></i></button>


    @if(!auth()->check())
    <div class="ms-md-5 mt-2 mt-md-0">
      <a type="button" class="btn btn-outline-primary fw-500 rounded ">
        <i class="fa-solid fa-user me-lg-2"></i>
        <p class="d-none d-lg-inline">Sign in</p>
      </a>
    </div>
    @else
    <div class="ms-md-5 mt-2 mt-md-0">
      <a type="button" class="btn btn-outline-primary fw-500 rounded ">
        <i class="fa-solid fa-user me-lg-2"></i>
        <p class="d-none d-lg-inline">Sign out</p>
      </a>
      <a type="button" class="btn btn-outline-primary fw-500 rounded ">
      <p class="d-none d-lg-inline">Register as service provider</p>
      </a>
    </div>
    @endif

    <ul class="dropdown-menu  dropdown-menu-start">
      <li><a class="dropdown-item" href="#">Best</a></li>
      <li><a class="dropdown-item" href="#">Special</a></li>
      <li><a class="dropdown-item" href="#">Latest</a></li>
    </ul>

  </div>