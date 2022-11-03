<div wire:ignore.self class="container">

	<div class="row" id="filter">
		<form>

			<div class="heading-section">
				<h2>Profile Details</h2>
			</div>


			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<div class="row">
				<div class="col-md-6" style="margin-top: -20px;">
					<img src="{{asset('media/'.$profile->getMedia('projectimages')[0]->id.'/'.$profile->getMedia('projectimages')[0]->file_name)}}" id="main">
					<div id="thumbnails">
						@forelse($profile->getMedia('projectimages') as $photo)
						<img src="{{asset('media/'.$photo->id.'/'.$photo->file_name)}}" />
						@empty
						@endforelse

					</div>
				</div>

				<div class="col-md-6">
					<div class="product-dtl">
						<div class="product-info">
							<div class="product-name">{{$profile->title}}</div>
							<button wire:click="chat" class="bg-info border-0 p-3" style='font-size:16px'>Lets have a chat first <i class='far fa-comment-dots'></i></button>

							<div class="reviews-counter">
								<div class="rate">
									<input type="radio" id="star5" name="rate" value="5" @checked($overallRate>=1) />
									<label for="star5" title="text">5 stars</label>
									<input type="radio" id="star4" name="rate" value="4" @checked($overallRate>=2) />
									<label for="star4" title="text">4 stars</label>
									<input type="radio" id="star3" name="rate" value="3" @checked($overallRate>=3) />
									<label for="star3" title="text">3 stars</label>
									<input type="radio" id="star2" name="rate" value="2" @checked($overallRate>=4)/>
									<label for="star2" title="text">2 stars</label>
									<input type="radio" id="star1" name="rate" value="1" @checked($overallRate>=5)/>
									<label for="star1" title="text">1 star</label>
								</div>
								<span>{{$profile->reviews->count() }} Reviews</span>
							</div>
							<div class="product-price-discount"><span>$ {{$profile->rate}}</span></div>
						</div>
						<p>{{$profile->description}}</p>

						<div class="product-count">
							<livewire:add-job key="{{ Str::random() }}" :profile="$profile">
						</div>
					</div>
				</div>
			</div>
			<div class="product-info-tabs">
				<ul class="nav nav-tabs" id="myTab" role="tablist">

					<li class="nav-item">
						<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$profile->reviews->count()}})</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

						<div class="review-heading">REVIEWS</div>
						@forelse($profile->reviews as $review)
						<p class="mb-20">{{$review->review}}</p>
						@empty
						<p class="mb-20">There are no reviews yet.</p>
						@endforelse
						<div>
							<div class="form-group">
								<form>
									<div class="stars" x-data="{ rate: @entangle('starRate')  }">
										<input type="radio" name="star" @click="$event.preventDefault();rate=1" val="1" class="star-1" id="star-1" />
										<label class="star-1" for="star-1">1</label>
										<input type="radio" name="star" @click="rate=2" val="2" class="star-2" id="star-2" />
										<label class="star-2" for="star-2">2</label>
										<input type="radio" name="star" @click="rate=3" val="3" class="star-3" id="star-3" />
										<label class="star-3" for="star-3">3</label>
										<input type="radio" name="star" @click="rate=4" val="4" class="star-4" id="star-4" />
										<label class="star-4" for="star-4">4</label>
										<input type="radio" name="star" @click="rate=5" val="5" class="star-5" id="star-5" />
										<label class="star-5" for="star-5">5</label>
										<span></span>
									</div>
								</form>


							</div>
							<div class="form-group">
								<label>Your message</label>
								<textarea wire:model.defer="review" class="form-control" rows="10"></textarea>
							</div>

							<button wire:click.prevent="submitReview" class="round-black-btn">Submit Review</button>
						</div>
					</div>
				</div>
			</div>

	</div>
	@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script>
		window.addEventListener('cantAddReview', event => {
			toastr.error("You can't add review yet", 'Ooops!')
		})

		window.addEventListener('addedReview', event => {
			toastr.success('Your review hass been added!', 'success!')
		})

		window.addEventListener('contentChanged', event => {})


		var thumbnails = document.getElementById("thumbnails")
		var imgs = thumbnails.getElementsByTagName("img")
		var main = document.getElementById("main")
		var counter = 0;

		for (let i = 0; i < imgs.length; i++) {
			let img = imgs[i]


			img.addEventListener("click", function() {
				main.src = this.src
			})

		}
	</script>


	@endpush