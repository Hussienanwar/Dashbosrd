@extends('website.layouts.app')
@section('content')
<div class="container-fluid">
<section class="section container my-5">


    <h2 class="text-center mb-4">{{ $Category->name }} Products</h2>

    <!-- كروت المنتجات -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

  @if($Category->proudects->isEmpty())
    <div class="alert alert-info">
      😕 No products found in this category.<br>
      Check other categories or come back later!
    </div>
  @else
      @foreach ($Category->proudects as $proudect)
        <div class="col">
          <div class="card h-100 position-relative shadow-sm">
            
            <!-- زرار القلب -->
         @auth
             <livewire:favorite-toggle :proudect="$proudect" />
         @endauth

            <!-- صورة المنتج -->
            <img src="{{ asset('storage/proudect/'.$proudect->image)}}" class="card-img-top product-img" alt="{{ $proudect->name }}">

            <!-- تفاصيل المنتج -->
            <div class="card-body text-center">
              <h5 class="card-title">{{ $proudect->name }}</h5>
              <h6 class="card-subtitle text-muted">{{ $proudect->price }} EGP</h6>
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
 @endif
</section>
              <div class="text-center mt-3">
                  <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
              </div>
</div>
@endsection