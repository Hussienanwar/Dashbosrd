@extends('Dashboard.layout.app')
@section('content')

        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
              </div>
            </div>
          </div>
        </div>
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
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'Accept')
                                <span class="badge bg-success">Accept</span>
                            @elseif($order->status == 'canceled')
                                <span class="badge bg-danger">Canceled</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                     <td>
                      <div class="text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm  mb-2">View</a>
                      </div>
                     
                         <div class="d-flex gap-2 mt-1 text-center">
                             <!-- زر قبول الأوردر -->
                             <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                 @csrf
                                 @method('PATCH')
                                 <input type="hidden" name="status" value="Accept">
                                 <button type="submit" class="btn btn-success btn-sm">Accept</button>
                             </form>
                     
                             <!-- زر إلغاء الأوردر -->
                             <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                 @csrf
                                 @method('PATCH')
                                 <input type="hidden" name="status" value="canceled">
                                 <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
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
