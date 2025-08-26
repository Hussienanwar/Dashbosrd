<div class="container-fluid">
    <section class="section container my-5">

        @if(session()->has('msg'))
            <div class="alert alert-success text-center">{{ session('msg') }}</div>
        @endif

        <h2 class="text-center mb-4">My Favorites</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse($favorites as $favorite)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/proudect/'.$favorite->product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $favorite->product->name }}" 
                             style="height:200px; object-fit:cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $favorite->product->name }}</h5>
                            <p class="card-text fw-bold">${{ $favorite->product->price }}</p>

                            <div class="mt-auto d-flex justify-content-between">
                                <!-- زرار الحذف بالـ Livewire -->
                                <button wire:click="remove({{ $favorite->id }})" 
                                        class="btn btn-danger btn-sm">
                                    Remove
                                </button>

                                <!-- زرار الإضافة للسلة (لسه form عادي أو ممكن تعمله Livewire برضو) -->
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
