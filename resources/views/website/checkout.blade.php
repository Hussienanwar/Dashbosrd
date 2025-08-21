@extends('website.layouts.app')
@section('content')

<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb mb-4">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Checkout</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Billing Details -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Billing Details</h5>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('checkout.placeOrder') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" rows="3" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Order Summary</h5>
                    <ul class="list-group mb-3">
                        @php $total = 0; @endphp
                        @foreach($carts as $cart)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $cart->proudect->name }} (x{{ $cart->quantity }})
                                <span>${{ $cart->proudect->price * $cart->quantity }}</span>
                                @php $total += $cart->proudect->price * $cart->quantity; @endphp
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                            Total
                            <span>${{ $total }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
