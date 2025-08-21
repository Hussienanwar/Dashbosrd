@extends('website.layouts.app')
@section('content')
<div class="container-fluid">
<section class="section container my-5">


    <h2 class="text-center mb-4">My Favorites</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @forelse($favorites as $favorite)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{asset('storage/proudect/'.$favorite->product->image ) }}" class="card-img-top" alt="{{ $favorite->product->name }}" style="height:200px; object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $favorite->product->name }}</h5>
                        <p class="card-text fw-bold">${{ $favorite->product->price }}</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <form action="{{ route('favorites.remove', $favorite->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>

                            <form action="{{ route('cart.add', $favorite->product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No favorites yet!</p>
            </div>
        @endforelse
    </div>

</section>
</div>
@endsection