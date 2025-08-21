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
            <div class="mb-3 d-flex align-items-center justify-content-center gap-2">
                <label for="quantity" class="fw-bold mb-0">Quantity:</label>
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-2" id="decrease">-</button>
                    <input type="number" id="quantity" value="1" min="1" class="form-control text-center mx-1" style="width: 60px;">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-2" id="increase">+</button>
                </div>
            </div>
            
            <!-- Action Buttons (centered under text) -->
                 <div class="d-flex gap-3 justify-content-center mb-4">
                     <button class="btn btn-primary">Add to Cart</button>
                     <button class="btn btn-outline-danger">Add to Wishlist</button>
                 </div>
              </div>
              
<div class="mt-4 text-center">
    <h5>Rate this product:</h5>
    <form action="{{ route('product.review', $proudect->id) }}" method="POST">
        @csrf
        <div class="star-rating mb-2">
            @for($i = 1; $i <= 5; $i++)
                <span class="star" data-value="{{ $i }}">&#9733;</span>
            @endfor
        </div>
        <input type="hidden" name="rating" id="rating-value" value="">
        <textarea name="comment" class="form-control mb-2" placeholder="Write your review..." rows="2"></textarea>
        <button type="submit" class="btn btn-success">Submit Review</button>
    </form>
</div>
                <!-- Back Button (bottom right) -->
            </div>
            <div class="text-start">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    
    </section>
</div>

@endsection
