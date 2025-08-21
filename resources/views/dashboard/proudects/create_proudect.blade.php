@extends('dashboard.layout.app')
@section('content')
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add proudect</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#"> Add proudect</a></li>
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
                <form class="form-horizontal" action="{{route('admin.proudect.add') }}" enctype="multipart/form-data" method="post">
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
                  @if (Session::has('msg'))
                  <div class="card-body">
                    <div class='alert alert-success'>{{ Session::get('msg')}}</div>
                  </div>
                    @endif
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="fname"
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
                          name="old('name')"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="price"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Price</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="number"
                          class="form-control"
                          id="price"
                          placeholder="Price Here"
                          name="price"
                          value="{{old('price')}}"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="image"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Image</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="file"
                          class="form-control"
                          id="image"
                          name="image"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="description"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Description</label
                      >
                      <div class="col-sm-9">
                        {{-- <input
                          type="text"
                          class="form-control"
                          id="price"
                          placeholder="description Here"
                          name="description"
                        /> --}}

                        <textarea name="description" class="form-control" 
                        id="description">{{old('description')}}</textarea>
                      </div>
                    </div>



                    <div class="form-group row">
                      <label
                        for="Categorys"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Categorys</label
                      >
                      <div class="col-sm-9">
                        <select class="form-select" name="category_id">
                          @foreach ($Categorys as $Category )
                            <option value="{{ $Category->id }}" @if ($Category->id == old('category_id'))
                            selected
                          @endif >{{ $Category->name }}</option>  
                            @endforeach
                        </select>
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
