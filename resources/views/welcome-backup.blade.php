<!DOCTYPE html>
<html dir="ltr" lang="en">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


<!--Font awesome!-->
<script src="https://kit.fontawesome.com/f4e855eb8f.js" crossorigin="anonymous"></script>

<head>
<meta name="csrf-token" content={{ csrf_token() }}>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex,nofollow,noarchive,nosnippet,noodp,notranslate,noimageindex" />
  <title>Welcome to Epro!</title>
  @livewireStyles
</head>
<link href="{{asset('app.css')}}" rel="stylesheet">
@vite('resources/js/app.js')

<body>

  <div>
    <div class="container pt-3">
      @livewire('navigation')
    </div>
    <hr>
    @livewire('poster')


    @yield('content')<div class="py-5">
      <div class="container">

        <div class="row d-flex">

          <div class="col-md-12 col-lg-3 mb-3">

            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/logo.svg"></img>
            <p class="mt-4 text-muted">© 2018- 2021 Templatemount.<br>
              All rights reserved.</p>

          </div>

          <div class="col-6 col-sm-6 col-md-4 col-lg-2">

            <h6 class="h6 fw-bold">Store</h6>

            <a href="#" class="text-decoration-none text-muted">About us</a>
            <a href="#" class="text-decoration-none text-muted">Find stories</a>
            <a href="#" class="text-decoration-none text-muted">Categories</a>
            <a href="#" class="text-decoration-none text-muted">Blogs</a>
          </div>

          <div class="col-6 col-sm-6 col-md-4 col-lg-2">
            <h6 class="h6 fw-bold">Information</h6>
            <a href="#" class="text-decoration-none text-muted">About us</a>
            <a href="#" class="text-decoration-none text-muted">Find stories</a>
            <a href="#" class="text-decoration-none text-muted">Categories</a>
            <a href="#" class="text-decoration-none text-muted">Blogs</a>
          </div>

          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-3 mt-md-0">
            <h6 class="h6 fw-bold">Support</h6>
            <a href="#" class="text-decoration-none text-muted">About us</a>
            <a href="#" class="text-decoration-none text-muted">Find stories</a>
            <a href="#" class="text-decoration-none text-muted">Categories</a>
            <a href="#" class="text-decoration-none text-muted">Blogs</a>
          </div>

          <div class="col-lg-3 mt-3 mt-lg-0">

            <h6 class="h6 fw-bold">Newsletter</h6>
            <p class="text-muted">Stay in touch with latest updates about our products and offers</p>

            <div class="input-group">
              <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button">Join</button>
              </div>
            </div>
          </div>

        </div>
        <!--row div-->

      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  @stack('scripts')

  @livewireScripts
</html>