@extends('website.layouts.app')
@section('content')

<div class="container-fluid">
  <section class="section container my-5">
    <h2 class="text-center mb-4">All Products</h2>

    <!-- كروت المنتجات -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach ($proudects as $proudect)
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
          @auth
            <livewire:cart :proudect="$proudect" />
          @endauth
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </section>
</div>

@endsection
