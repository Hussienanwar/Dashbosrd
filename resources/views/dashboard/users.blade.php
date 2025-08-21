@extends('Dashboard.layout.app')
@section('content')


        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
            </div>
          </div>
        </div>
<div class="container-fluid py-2">
    
                <h2 class="mb-4 text-center">Users List</h2>
            
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->created_at ? $user->created_at->format('d M Y H:i') : 'Never' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
