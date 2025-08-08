@extends('Dashboard.layout.app')
@section('content')
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Home</h4>
                   <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('admin.category.table_catg') }}">All proudects</a></li>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">proudect Details</a></li>
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

  <div class="card-body">
    
              <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Details</h5>
                  <div class="table-responsive">
            <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                    <tbody>
                        <tr>
                          <th class='w-25 bg-dark text-light'>Id</th>
                          <td>{{ $Category->id}}</td>
                        </tr>
                        
                        <tr>
                            <th class='w-25 bg-dark text-light'>Name</th>
                            <td>{{ $Category->name }}</td>
                        </tr>

                        <tr>
                            <th class='w-25 bg-dark text-light'>Created At</th>
                            <td>{{ $Category->created_at?? 'No Data'}}</td>
                        </tr>

                        <tr>
                            <th class='w-25 bg-dark text-light'>Updated At</th>
                            <td>{{ $Category->updated_at ?? 'No Data'}}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <a href="{{route('admin.category.table_catg')}}" class="btn btn-primary">Back</a> 
                 </div>
                </div>
            </div>
          </div>
        
</div>

</div>
@endsection
