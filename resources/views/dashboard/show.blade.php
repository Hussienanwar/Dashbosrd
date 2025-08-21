@extends('Dashboard.layout.app')
@section('content')

<div class="container-fluid py-4 d-flex justify-content-center">
    <section class="section my-5 w-75">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <h4>Order #{{ $order->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>User Name:</strong> {{ $order->name ?? ($order->user->name ?? 'Guest') }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                        <p><strong>Status:</strong> 
                            @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($order->status == 'canceled')
                                <span class="badge bg-danger">Canceled</span>
                            @endif
                        </p>
                        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                    </div>
                </div>

                <h5 class="mt-4">Products:</h5>
                @if($order->items->count())
                    @foreach($order->items as $item)
                        <div class="d-flex align-items-center mb-2 border p-2 rounded">
                            <img src="{{ asset('storage/proudect/'.$item->proudect->image) }}" 
                                 alt="{{ $item->proudect->name }}" class="me-3" width="60">
                            <div class="text-start flex-grow-1">
                                <h6 class="mb-0"><strong>{{ $item->proudect->name }}</strong></>
                                <h6>Quantity: {{ $item->quantity }}</h6>
                            </div>
                            <div class="text-end">
                                <p class="mb-0">{{ $item->price }} EGP (each)</p>
                                <strong>Total: {{ $item->price * $item->quantity }} EGP</strong>
                            </div>
                        </div>
                    @endforeach
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
