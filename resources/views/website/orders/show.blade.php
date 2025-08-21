@extends('website.layouts.app')
@section('content')

<div class="container-fluid py-4 d-flex justify-content-center">
    <section class="section my-5 w-50">
        <div class="card mb-3 text-center">
            <div class="card-body">
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                
                <h5 class="mt-4">Products:</h5>
                @if($order->items->count())
                    @foreach($order->items as $item)
                        <div class="d-flex align-items-center mb-2 border p-2 rounded">
                            <img src="{{ asset('storage/proudect/'.$item->proudect->image) }}" alt="{{ $item->proudect->name }}" class="me-3" width="60">
                            <div class="text-start flex-grow-1">
                                <p class="mb-0"><strong>{{ $item->proudect->name }}</strong></p>
                                <small>Quantity: {{ $item->quantity }}</small>
                            </div>
                            <div>
                                <p class="mb-0">{{ $item->price }} EGP (each)</p>
                                <strong>Total: {{ $item->price * $item->quantity }} EGP</strong>
                            </div>
                        </div>
                        @endforeach
                        <p><strong>Total:</strong> {{ $order->total }} EGP</p>
                @else
                    <p>No items found.</p>
                @endif

                <div class="mt-3 text-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
