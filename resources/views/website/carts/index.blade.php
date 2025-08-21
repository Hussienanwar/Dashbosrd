@extends('website.layouts.app')

@section('content')
<div class="container-fluid mt-4">

    <h2 class="mb-4">My Cart</h2>

    @if($carts->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($carts as $index => $item)
                    @php 
                        $total = $item->proudect->price * $item->quantity;
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->proudect->name }}</td>
                        <td>
                            <img src="{{ asset('storage/proudect/'.$item->proudect->image) }}" 
                                 width="60" height="50" alt="product">
                        </td>
                        <td>${{ number_format($item->proudect->price, 2) }}</td>
                        <td>
                              <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline-block">
                                  @csrf
                                  <input type="hidden" name="action" value="decrease">
                                  <button type="submit" class="btn btn-sm btn-warning">-</button>
                              </form>
                              <span class="mx-2">{{ $item->quantity }}</span>
                              <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline-block">
                                  @csrf
                                  <input type="hidden" name="action" value="increase">
                                  <button type="submit" class="btn btn-sm btn-success">+</button>
                              </form>
                        </td>
                        <td>${{ number_format($total, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-end"><strong>Grand Total:</strong></td>
                    <td colspan="2"><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
    @else
        <div class="alert alert-info">
            Your cart is empty.
        </div>
    @endif

</div>
@endsection