@extends('website.layouts.app')
@section('content')

<div class="container-fluid">
<section class="section container my-4">
<div class="container py-2">
    <div class="row">
        <!-- User Info -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ auth()->user()->name }}</h4>
                    <p class="card-text">{{ auth()->user()->email }}</p>
                    <a href="{{ route('settings') }}" class="btn btn-warning mt-3 w-100">
                        Account Settings
                    </a>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm h-100">
            <div class="card-body">
            <h5 class="card-title mb-3">Your Orders</h5>
    <div class="mb-4 border rounded p-3">
    @foreach($orders as $order)
    <h6>Orders#{{ $loop->iteration }} <span class="text-success">{{ ucfirst($order->status) }}</span> /
    <small>Date: {{ $order->created_at->format('d M, Y') }}</small>/
    <strong>Total:</strong> ${{ $order->total }}
    </h6>
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>

@endsection
