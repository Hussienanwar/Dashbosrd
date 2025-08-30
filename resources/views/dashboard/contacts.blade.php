@extends('Dashboard.layout.app')
@section('content')

        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                </nav>
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
                    <h2 class="mb-4">Contact Messages</h2>
                  <div class="table-responsive">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered "
                    >
                            <thead class="">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                  <th>Message</th>
                <th>Sent At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr class="text-center">
                    <td>
                      {{ $loop->iteration }}
                      @if($contact->status == 'notread')
                        <span class="badge bg-primary">●</span>
                      @endif
                    </td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class='w-50' onsubmit="return confirm('Are you sure to delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger  w-100">Delete</button>
                        </form>
                        
                        <form action="{{ route('admin.contacts.updateStatus', $contact->id) }}" method="POST" class="w-50">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="read">
                            <button type="submit" class="btn btn-success w-100">Read</button>
                        </form>
                      {{-- @if($contact->status == 'notread')
                        <form action="{{ route('admin.contacts.updateStatus', $contact->id) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="read">
                          <button type="submit" class="btn btn-success w-100">Read</button>
                        </form>
                      @endif --}}

                      </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No messages found.</td>
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
