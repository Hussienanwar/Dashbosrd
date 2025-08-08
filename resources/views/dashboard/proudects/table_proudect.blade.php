@extends('Dashboard.layout.app')
@section('content')

        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">All proudects</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">All proudects</a></li>
                    </li>
                  </ol>
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
                  <h5 class="card-title">Proudect Datatable</h5>
                  <div class="table-responsive">
                    @if (Session::has('msg'))
                      <div class="card-body">
                      <div class='alert alert-success'>{{ Session::get('msg')}}</div>
                      </div>
                    @endif
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                          
                         
                         @forelse( $proudects as $proudect )
                         <tr>
                           <td>{{ $proudect->id}}</td>
                           <td>{{ $proudect->name }}</td>
                           <td>{{ $proudect->description }}</td>
                           <td>{{ $proudect->price }}</td>
                           <td>
                            <a href="{{route('admin.proudect.show',[$proudect->id])}}" class="btn btn-info ">Details</a>
                            <a href="{{route('admin.proudect.edit',[$proudect->id])}}" class="btn btn-warning ">Edait</a>
                           <form method="post" class="d-inline-block" 
                           action="{{route ('admin.proudect.delete',[$proudect->id])}}">
                            @csrf
                            @method('delete')
                           <input type="submit" class="btn btn-danger" value="delete">
                           </form>
                          </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan='3' class="text-center">No Data</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                    
                    <div class="card-body">
                    <a href="{{route('admin.proudect.create_prod')}}" class="btn btn-primary">Add New</a> 
                     </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
          <!-- End Page Content -->

        </div>
        <!-- End Container fluid -->
@endsection
