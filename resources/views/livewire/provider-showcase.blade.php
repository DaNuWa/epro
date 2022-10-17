
<div class="container">
    <h3 class="fw-bold mb-sm-3 mb-md-5 text-center text-md-start">New products</h3>

    <div class="row g-3 d-flex justify-content-evenly">
      
    @forelse($profiles as $profile)
      <div class="card" style="width: 18rem;">
        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/2.jpg" width="100%" height="240px"></img>

        <div class="card-body">
          <hr>
          <h5 class="card-title">Rs {{$profile->rate}}</h5>
          <h6 class="card-subtitle mb-2 text-bold">{{$profile->title}}</h6>

          <a href="{{route('profile.view',)}}" role="button" class="btn btn-primary card-link py-2 px-4">View my profile</a>
          <a href="#" class="btn btn-outline-primary card-link "> <i class="fa-solid fa-heart"></i></a>
        </div>
      </div>
      @empty
      @endforelse


    </div>
    <!--row and container div--->
  </div>
