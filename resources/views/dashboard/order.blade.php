@extends('Dashboard.layout.app')
@section('content')


        <!-- End Bread crumb -->

        <!-- Container fluid -->
        <div class="container-fluid">
          <!-- Start Page Content -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                 <h2 class="mb-4 text-center">Orders List</h2>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Total Items</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->name ?? ($order->user->name ?? 'Guest') }}</td>
                        <td>{{ $order->items->count() }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>
                            @if($order->status == 'pending')
                              <h4><span class="badge bg-warning text-dark">Pending</span></h4>
                            @elseif($order->status == 'Accept')
                              <h4><span class="badge bg-success">Accept</span></h4>
                            @elseif($order->status == 'canceled')
                              <h4><span class="badge bg-danger">Canceled</span></h4>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
<td>
    <!-- زر عرض الأوردر -->
    <div class="text-center mb-2">
        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm w-100">
            View
        </a>
    </div>

    <!-- أزرار Accept و Cancel -->
    <div class="d-flex justify-content-center gap-2">
        <!-- زر قبول الأوردر -->
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="w-50">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Accept">
            <button type="submit" class="btn btn-success w-100">Accept</button>
        </form>

        <!-- زر إلغاء الأوردر -->
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="w-50">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="canceled">
            <button type="submit" class="btn btn-danger w-100">Cancel</button>
        </form>
    </div>
</td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
                    </table>
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
          <!-- End Page Content -->

        </div>
        <!-- End Container fluid -->
@endsection
