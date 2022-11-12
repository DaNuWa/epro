<!DOCTYPE html>
<html dir="ltr" lang="en">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>

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

            <p class="mt-4 text-muted"> <br>
              All rights reserved.</p>

          </div>

          <div class="col-6 col-sm-6 col-md-4 col-lg-2">


          <div style="width: 550px; margin-top:46px;" class="d-flex justify-content-around">
            <a href="{{route('faq.view')}}" class="text-decoration-none text-muted">Faq</a>
            <a href="{{route('privacy.view')}}" class="text-decoration-none text-muted">Privacy policy</a>
            <a href="{{route('conditions.view')}}" class="text-decoration-none text-muted">Terms and conditions</a>
            <a href="{{route('who.view')}}" class="text-decoration-none text-muted">Who we are</a>
            <a href="https://www.facebook.com/profile.php?id=100087761490713" target="_blank" class="text-decoration-none text-muted"><ion-icon name="logo-facebook" size="small"></ion-icon></i></a>
            <a href="https://instagram.com/epro.lk?igshid=YmMyMTA2M2Y=" target="_blank" class="text-decoration-none text-muted"><ion-icon name="logo-instagram" size="small"></ion-icon></i></a>
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
  @livewireScripts
  @stack('scripts')
</html>