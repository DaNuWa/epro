<div class="container">
	<div class="heading-section">
		<h2>Profile Details</h2>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div id="slider" class="owl-carousel product-slider">
			@forelse($profile->getMedia('projectimages') as $photo)
				<div class="item">
				<img src="{{asset('media/'.$photo->id.'/'.$photo->file_name)}}" />
				</div>
				@empty
				@endforelse

			</div>
			<div id="thumb" class="owl-carousel product-thumb">
				@forelse($profile->getMedia('projectimages') as $photo)
				<div class="item">
					<img src="{{asset('media/'.$photo->id.'/'.$photo->file_name)}}" />
				</div>
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
						<span>3 Reviews</span>
					</div>
					<div class="product-price-discount"><span>Rs {{$profile->rate}}</span></div>
				</div>
				<p>{{$profile->description}}</p>

				<div class="product-count">
					<label for="size">Hours</label>
					<form action="#" class="display-flex">
						<div class="qtyminus">-</div>
						<input type="text" name="quantity" value="1" class="qty">
						<div class="qtyplus">+</div>
					</form>
					<a href="#" class="round-black-btn">Pay</a>
				</div>
			</div>
		</div>
	</div>
	<div class="product-info-tabs">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$profile->reviews->count()}})</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				{{$profile->description}}
			</div>
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="review-heading">REVIEWS</div>
				@forelse($profile->reviews as $review)
				<p class="mb-20">{{$review->review}}</p>
				@empty
				<p class="mb-20">There are no reviews yet.</p>
				@endforelse
				<form class="review-form">
					<div class="form-group">
						<label>Your rating</label>
						<div class="reviews-counter">
							<div class="rate">
								<input type="radio" id="star5" name="rate" value="5" />
								<label for="star5" title="text">5 stars</label>
								<input type="radio" id="star4" name="rate" value="4" />
								<label for="star4" title="text">4 stars</label>
								<input type="radio" id="star3" name="rate" value="3" />
								<label for="star3" title="text">3 stars</label>
								<input type="radio" id="star2" name="rate" value="2" />
								<label for="star2" title="text">2 stars</label>
								<input type="radio" id="star1" name="rate" value="1" />
								<label for="star1" title="text">1 star</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Your message</label>
						<textarea class="form-control" rows="10"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="Name*">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="Email Id*">
							</div>
						</div>
					</div>
					<button class="round-black-btn">Submit Review</button>
				</form>
			</div>
		</div>
	</div>

</div>
</div>
@push('scripts')
<script>
	$(document).ready(function() {
		var slider = $("#slider");
		var thumb = $("#thumb");
		var slidesPerPage =  @json($profile->photos->count());; //globaly define number of elements per page
		var syncedSecondary = true;
		slider.owlCarousel({
			items: 1,
			slideSpeed: 2000,
			nav: false,
			autoplay: false,
			dots: false,
			loop: true,
			responsiveRefreshRate: 200
		}).on('changed.owl.carousel', syncPosition);
		thumb
			.on('initialized.owl.carousel', function() {
				thumb.find(".owl-item").eq(0).addClass("current");
			})
			.owlCarousel({
				items: slidesPerPage,
				dots: false,
				nav: true,
				item: 4,
				smartSpeed: 200,
				slideSpeed: 500,
				slideBy: slidesPerPage,
				navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
				responsiveRefreshRate: 100
			}).on('changed.owl.carousel', syncPosition2);

		function syncPosition(el) {
			var count = el.item.count - 1;
			var current = Math.round(el.item.index - (el.item.count / 2) - .5);
			if (current < 0) {
				current = count;
			}
			if (current > count) {
				current = 0;
			}
			thumb
				.find(".owl-item")
				.removeClass("current")
				.eq(current)
				.addClass("current");
			var onscreen = thumb.find('.owl-item.active').length - 1;
			var start = thumb.find('.owl-item.active').first().index();
			var end = thumb.find('.owl-item.active').last().index();
			if (current > end) {
				thumb.data('owl.carousel').to(current, 100, true);
			}
			if (current < start) {
				thumb.data('owl.carousel').to(current - onscreen, 100, true);
			}
		}

		function syncPosition2(el) {
			if (syncedSecondary) {
				var number = el.item.index;
				slider.data('owl.carousel').to(number, 100, true);
			}
		}
		thumb.on("click", ".owl-item", function(e) {
			e.preventDefault();
			var number = $(this).index();
			slider.data('owl.carousel').to(number, 300, true);
		});


		$(".qtyminus").on("click", function() {
			var now = $(".qty").val();
			if ($.isNumeric(now)) {
				if (parseInt(now) - 1 > 0) {
					now--;
				}
				$(".qty").val(now);
			}
		})
		$(".qtyplus").on("click", function() {
			var now = $(".qty").val();
			if ($.isNumeric(now)) {
				$(".qty").val(parseInt(now) + 1);
			}
		});
	});



</script>
@endpush