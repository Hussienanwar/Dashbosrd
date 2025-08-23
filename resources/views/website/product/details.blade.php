@extends('website.layouts.app')
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
    </div>
  </div>
</div>

<div class="container py-5">
    <!-- Product Details Section -->
    <section class="mb-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('storage/proudect/'.$proudect->image) }}" 
                     class="img-fluid rounded shadow" 
                     alt="Product">
            </div>

            <!-- Product Info -->
            <div class="col-md-6 d-flex flex-column justify-content-between " style="height: 100%;">
              <div class="text-center">
                 <h2 class="mb-3">{{ $proudect->name }}</h2>
                 <p class="text-muted">{{ $proudect->price }} EGP</p>
                 <h4 class="text-success mb-4">{{ $proudect->description }}</h4>

                 <!-- Quantity Selector -->
<div class="d-flex flex-column align-items-center gap-3 mb-3">
    @auth
        {{-- تحديد الكمية --}}
        <form action="{{ route('cart.toggle', $proudect->id) }}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            <div class="input-group" style="width: 150px;">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="this.nextElementSibling.stepDown()">-</button>
                <input type="number" name="quantity" value="1" min="1" class="form-control text-center">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="this.previousElementSibling.stepUp()">+</button>
            </div>

            @php
                $inCart = \App\Models\Cart::where('user_id', auth()->id())
                            ->where('proudect_id', $proudect->id)
                            ->exists();
            @endphp

            <button type="submit" class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }}">
                {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
            </button>
        </form>

        {{-- المفضلة --}}
        @php
            $isFavorite = \App\Models\Favorite::where('user_id', auth()->id())
                ->where('proudect_id', $proudect->id)
                ->exists();
        @endphp

        <form action="{{ route('favorites.toggle', $proudect->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-light border">
                <i class="bi {{ $isFavorite ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                {{ $isFavorite ? 'Remove from Wishlist' : 'Add to Wishlist' }}
            </button>
        </form>
    @endauth
</div>



                <!-- Average Rating -->
                <div class="mb-4">
                    @php
                        $averageRating = $proudect->reviews->avg('rating');
                        $reviewsCount = $proudect->reviews->count();
                    @endphp

                    @if($reviewsCount > 0)
                        <p class="fw-bold">
                             Rating: 
                            <span class="text-warning">
                                {{ number_format($averageRating, 1) }} 
                            </span> 
                            (based on {{ $reviewsCount }} reviews)
                        </p>
                    @else
                        <p class="text-muted">No reviews yet</p>
                    @endif
                </div>
              </div>
              </div>
              <!-- Review Form -->

   <div class="row mt-4">
    <!-- Old Reviews (Left) -->
<div class="col-md-6">
    <h5 class="mb-3">Customer Reviews:</h5>
    @forelse($proudect->reviews->take(5) as $review) <!-- آخر 5 تقييمات فقط -->
        <div class="border rounded p-2 mb-2">
            <strong>{{ $review->user->name }}</strong>
            <div class="mb-1">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->rating)
                        <span style="color: gold;">&#9733;</span>
                    @else
                        <span style="color: #ccc;">&#9733;</span>
                    @endif
                @endfor
            </div>
            <p class="mb-0">{{ $review->comment }}</p>
        </div>
    @empty
        <p class="text-muted">No reviews yet. Be the first to review this product!</p>
    @endforelse
</div>


    <!-- Add Review Form (Right) -->
    <div class="col-md-6 text-center">
        <h5>Rate this product:</h5>
        <form action="{{ route('product.review', $proudect->id) }}" method="POST"> @csrf <div class="star-rating mb-2">
             @for($i = 1; $i <= 5; $i++) 
             <span class="star" data-value="{{ $i }}">&#9733;</span> @endfor </div> 
             <input type="hidden" name="rating" id="rating-value" value=""> 
             <textarea name="comment" class="form-control mb-2" placeholder="Write your review..." rows="2">
                </textarea> <button type="submit"
                 class="btn btn-success">Submit Review</button> 
            </form>
    </div>
</div>


              <!-- Back Button -->
              <div class="text-start mt-3">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
              </div>
        
    </section>
</div>

@endsection
