<div class="input-group">
  <a class="navbar-brand" href="{{route('home')}}"><img width="70" height="70" class="me-3 me-md-5" src="{{asset('logo.png')}}"></img> </a>
  <input type="text"  wire:model="term" id="input-form" class="form-control" placeholder="Search" aria-label="Text input with dropdown button">
  <button class="btn btn-primary d-none d-lg-block"><i class="fa-solid fa-magnifying-glass rounded d-none d-lg-block"></i></button>


  @if(!auth()->check())
  <div style="margin-top: 15px !important;" class="ms-md-5  mt-md-0">
    <a wire:click="signin" type="button" class="btn btn-outline-primary fw-500 rounded ">
      <i class="fa-solid fa-user me-lg-2"></i>
      <p  class="d-none d-lg-inline">Sign in</p>
    </a>
  </div>
  @else
  <div style="margin-top: 15px !important;" class="ms-md-5 mt-5 mt-md-0">
    <a type="button" wire:click="logout" class="btn btn-outline-primary fw-500 rounded ">
      <i class="fa-solid fa-user me-lg-2"></i>
      <p class="d-none d-lg-inline">Sign out</p>
    </a>
    @if(!auth()->user()->is_provider)
    <a wire:click="regiserAsServiceProvider" type="button" class="btn btn-outline-primary fw-500 rounded ">
      <p class="d-none d-lg-inline">Register as service provider</p>
    </a>
    @else
    @endif
    <a href="{{route('serviceprovider.jobs.view')}}" type="button" class="btn btn-outline-primary fw-500 rounded ">
      <p class="d-none d-lg-inline">Dashboard</p>
    </a>
  </div>
  @endif



</div>