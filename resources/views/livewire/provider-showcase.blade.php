<div class="container">
  <h3 class="fw-bold mb-sm-3 mb-md-5 text-center text-md-start">New products</h3>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        @foreach(\App\Models\Category::all() as $category )
        <li class="nav-item active">
          <a wire:click.prevent="filterProviders({{$category->id}})" class="nav-link" href="#">{{$category->name}}</a>
        </li>
        @endforeach
      </ul>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Sort 
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <button wire:click="sortPrice('max')" class="dropdown-item" type="button">Sort By price (Top to bottom)</button>
    <button wire:click="sortPrice('min')" class="dropdown-item" type="button">Sort By price (Bottom to top)</button>
    <button  wire:click="sortByReviews" class="dropdown-item" type="button">Sort by reviews</button>
  </div>
</div>
    </div>
  </nav>

  <div class="row g-3 d-flex justify-content-evenly my-3">

    @forelse($profiles as $profile)
    <div wire:key="{{$profile->id}}" class="card" style="width: 18rem;">
      <img src="{{asset('media/'.$profile->getMedia('projectimages')[0]?->id.'/'.$profile->getMedia('projectimages')[0]->file_name)}}" width="100%" height="240px"></img>

      <div class="card-body">
        <hr>
        <h5 class="card-title">$ {{$profile->rate}}</h5>
        <h6 class="card-subtitle mb-2 text-bold">{{$profile->title}}</h6>

        <a href="{{route('profile.view',$profile)}}" role="button" class="btn btn-primary card-link py-2 px-4">View my profile</a>
      </div>
    </div>
    @empty
    <div class="card-body">
        <hr>
        <h6 class="card-subtitle mb-2 text-bold">No service provider available</h6>
      </div>
    @endforelse


  </div>
  <!--row and container div--->
</div>