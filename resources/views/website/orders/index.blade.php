@extends('website.layouts.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Orders</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">All Orders</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->total }}</td> {{-- ✅ خليها total مش total_price --}}
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                {{-- لو حابب تعمل صفحة عرض تفاصيل --}}
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No Orders Found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
