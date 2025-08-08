@extends('Dashboard.layout.app')
@section('content')

        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Edait proudect</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('admin.proudect.table_prod') }}"> All proudect</a></li>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="#"> Edit proudect</a></li>
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
                <form class="form-horizontal" action="{{route('admin.proudect.update', $proudect->id) }}" enctype="multipart/form-data" method="post">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    @if (Session::has('msg'))
                    <div class='alert alert-success'>{{ Session::get('msg')}}</div>
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="name"
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
                          value="{{ $proudect->name}}"
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
                          value="{{$proudect->price}}"
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
                        <textarea class="form-control"id="description"
                        name="description">{{$proudect->description}}</textarea>
                      </div>
                    </div>

                    {{-- <div class="form-group row">
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
                          placeholder=""
                          name="image"
                        />
                      </div>
                    </div> --}}

                    <div class="form-group row">
                      <label
                        for="Categorys"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Categorys</label
                      >
                      
                      <div class="col-sm-9">
                        <select class="form-select" name="category_id" >
                          @foreach ($Categorys as $Category )
                           <option value="{{ $Category->id }}" @if ($Category->id == $proudect->id)
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
                        Save
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
