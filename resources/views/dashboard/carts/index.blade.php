@extends('Dashboard.layout.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Carts</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">All Carts</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Total Items</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                         @forelse( $carts as $cart )
                         <tr>
                            <td>{{ $cart->id}}</td>
                            <td>{{ $cart->user->name ?? 'Guest' }}</td>
                            <td>{{ $cart->items->count() }}</td>
                            <td>{{ $cart->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.carts.show', $cart->id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('admin.carts.destroy', $cart->id) }}" method="POST" style="display:inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan='3' class="text-center">No Carts Found</td>
                          </tr>
                        @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
