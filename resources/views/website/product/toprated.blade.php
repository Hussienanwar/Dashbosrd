@extends('website.layouts.app')
@section('content')

<div class="container-fluid">
  <section class="section container my-5">

    <h2 class="text-center mb-4">Top rated products</h2>

<section class="section container my-5">
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
      <a href="{{ route('allproducts') }}" class="btn btn-dark">All Products</a>
  </div>
</section>


  </section>
</div>
@endsection
