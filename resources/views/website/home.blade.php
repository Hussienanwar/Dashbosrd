@extends('website.layouts.app')
@section('content')
<div class="container-fluid">

<section class="section container my-5">
<div class="card text-bg-dark">
  <img src="{{ asset('assets/images/header.png') }}" class="card-img" alt="Welcome to Our Store">
  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center">
    <h2 class="card-title fw-bold">✨ Welcome to Ra3d Store ✨</h2>
    <p class="card-text fs-5">
      Discover everything you need in one place — from food and electronics to toys, fashion, and sports gear.  
    </p>
    <a href="#" class="btn btn-light btn-lg mt-2">Start Shopping</a>
  </div>
</div>
</section>



<section class="section container my-5">
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    @foreach ($proudects as $index => $proudect)
<div class="carousel-item @if($loop->first) active @endif">
  <img src="{{ asset('storage/proudect/'.$proudect->image)}}" class="d-block w-100" alt="...">

  <div class="carousel-caption d-none d-md-block">
    <a href="{{ route('allproducts') }}" class="btn btn-dark">Shop Now</a>
  </div>
</div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</section>

<section class="section container my-5">
  <h2 class="text-center mb-4">Products</h2>
  <!-- كروت المنتجات -->
  <div class="row">
    @foreach ($proudects as  $proudect)
      <div class="col-md-3 mb-4">
        <div class="card h-100 position-relative shadow-sm">
          

@auth
    <livewire:favorite-toggle :proudect="$proudect" />
@endauth

          <!-- صورة المنتج -->
          <a href="{{ route('details',$proudect->id) }}"><img src="{{ asset('storage/proudect/'.$proudect->image)}}" class="card-img-top product-img" alt="..."></a>

          <!-- تفاصيل المنتج -->
          <div class="card-body text-center">
            <h5 class="card-title">{{ $proudect->name }}</h5>
            <h6 class="card-title text-muted">{{ $proudect->price }} EGP</h6>

@php
    $inCart = \App\Models\Cart::where('user_id', auth()->id())
                ->where('proudect_id', $proudect->id)
                ->exists();
@endphp

@auth
    <a href="{{ route('cart.toggle', $proudect->id) }}" 
       class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }} mt-2">
        {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
    </a>
@endauth

          </div>
        </div>
      </div>
    @endforeach
</div>

<div class="text-center">
<a href="{{ route('allproducts') }}" class="btn btn-dark ">All Products</a>
</div>
</section>



<section class="section container my-5">
    <h2 class="text-center mb-4">Categories</h2>
    <!-- كروت المنتجات -->
    <div class="row gap-3">
        @foreach ($categorys as  $category)
        <div class="card gap-3" style="width: 14rem;">
          <a href="{{ route('category.details', $category->id) }}" class="btn">
            <div class="card-body text-center ">
                <h4 class="card-title">{{ $category->name }}</h4>
              </div>
            </a>
        </div>
        @endforeach
</div>

<div class="text-center">
    <a href="{{ route('allcategorys') }}" class="btn btn-dark ">All Categories</a>
</div>
</section>


<div class="card text-center shadow-lg border-0">
  <div class="card-header bg-dark text-white fs-4">
    About Us
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to Ra3d Store</h5>
    <p class="card-text">
      We are an all-in-one online store offering a wide variety of products 
      from food and groceries to electronics, fashion, toys, and sports equipment.  
      Our mission is to provide high-quality products at the best prices, 
      ensuring a simple and enjoyable shopping experience for everyone.
    </p>
    <a href="{{ route('about') }}" class="btn btn-dark px-4">Read More</a>
  </div>
</div>



<section class="section container my-5">
    <h2 class="text-center mb-4">Best-selling Products</h2>
    <div class="row">
        @foreach ($topselling as $proudect)
            <div class="col-md-3 mb-4">
                <div class="card h-100 position-relative shadow-sm">

         @auth
             <livewire:favorite-toggle :proudect="$proudect" />
         @endauth

                    <a href="{{ route('details',$proudect->id) }}">
                        <img src="{{ asset('storage/proudect/'.$proudect->image)}}" class="card-img-top product-img" alt="{{ $proudect->name }}">
                    </a>

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $proudect->name }}</h5>
                        <h6 class="card-title text-muted">{{ $proudect->price }} EGP</h6>

                        @auth
                            @php
                                $inCart = \App\Models\Cart::where('user_id', auth()->id())
                                    ->where('proudect_id', $proudect->id)
                                    ->exists();
                            @endphp
                            <a href="{{ route('cart.toggle', $proudect->id) }}" 
                               class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }} mt-2">
                                {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
                            </a>
                            
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<div class="card text-bg-dark">
  <img src="{{ asset('assets/images/header.png') }}" class="card-img" alt="Special Offer">
  <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center">
    <h2 class="card-title fw-bold">🔥 Special Offer 🔥</h2>
    <p class="card-text fs-5">
      Up to <span class="fw-bold text-warning">50% OFF</span> on Electronics, Fashion, and Sports Equipment!
    </p>
    <a href="#" class="btn btn-light btn-lg mt-2">Show Now</a>
  </div>
</div>


<section class="section container my-5">
  <h2 class="text-center mb-4">Top rated products</h2>
  <div class="row">
      @foreach ($topRatedProducts as $proudect)
          <div class="col-md-3 mb-4">
            <div class="card h-100 position-relative shadow-sm">
              

         @auth
             <livewire:favorite-toggle :proudect="$proudect" />
         @endauth

              <a href="{{ route('details',$proudect->id) }}">
                <img src="{{ asset('storage/proudect/'.$proudect->image)}}" class="card-img-top product-img" alt="{{ $proudect->name }}">
              </a>

              <div class="card-body text-center">
                <h5 class="card-title">{{ $proudect->name }}</h5>
                <h6 class="card-title text-muted">{{ $proudect->price }} EGP</h6>
                
                <div class="mb-2">
                    @php $avgRating = round($proudect->reviews_avg_rating ?? 0); @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $avgRating)
                            <i class="bi bi-star-fill text-warning"></i>
                        @else
                            <i class="bi bi-star text-warning"></i>
                        @endif
                    @endfor
                </div>
@php
    $inCart = \App\Models\Cart::where('user_id', auth()->id())
                ->where('proudect_id', $proudect->id)
                ->exists();
@endphp

@auth
    <a href="{{ route('cart.toggle', $proudect->id) }}" 
       class="btn {{ $inCart ? 'btn-danger' : 'btn-success' }} mt-2">
        {{ $inCart ? 'Remove from Cart' : 'Add to Cart' }}
    </a>
@endauth

              </div>
            </div>
          </div>
      @endforeach
  </div>
  <div class="text-center mt-3">
      <a href="{{ route('toprated') }}" class="btn btn-dark">View All</a>
  </div>
</section>





<section class="section container my-5">
  <h2 class="text-center mb-4">Features</h2>
  <div class="row g-4 justify-content-center">
    
    <div class="col-md-4">
      <div class="card border-success h-100">
        <div class="card-header">Wide Variety</div>
        <div class="card-body text-success">
          <h5 class="card-title">One Place for Everything</h5>
          <p class="card-text">
            From fresh food and groceries to electronics, toys, and more — our store has everything you need in one place.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-success h-100">
        <div class="card-header">Quality Products</div>
        <div class="card-body text-success">
          <h5 class="card-title">Trusted Brands</h5>
          <p class="card-text">
            We provide only high-quality and trusted products — whether it’s sports equipment, home essentials, or daily needs.
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-success h-100">
        <div class="card-header">Convenience</div>
        <div class="card-body text-success">
          <h5 class="card-title">Shop Anytime</h5>
          <p class="card-text">
            Enjoy easy shopping with fast delivery, secure payments, and a wide range of categories available 24/7.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>



</div>
@endsection