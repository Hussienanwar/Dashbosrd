@extends('Dashboard.layout.app')
@section('content')

        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Categorys</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#"> Add Category</a></li>
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
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="{{route('admin.category.add_catg') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  
                  @if ($errors->any())                    
                  <div class="card-body">
                    <div class='alert alert-danger'>
                      <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  @endif

                  <div class="card-body">
                    @if (Session::has('msg'))
                    <div class='alert alert-success'>{{ Session::get('msg')}}</div>
                    @endif
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder=" Name Here"
                          name="name"
                          value="{{ old('name') }}"
                        />
                      </div>
                    </div>


                    </div>



                    </div>
                  </div>
                  
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
        <!-- End Container fluid -->
@endsection
