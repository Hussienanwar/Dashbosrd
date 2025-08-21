@extends('Dashboard.layout.app')
@section('content')
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
            </div>
          </div>
        </div>

<div class="container-fluid pb-0">
    <section class="section container my-2 pb-0">
        <div class="text-center mb-4">
            <div class="card-body">
                <h1 class="card-text mb-5">Welcome To Dashboard</h1>
            </div>
        </div>

        <div class="row text-center g-4">
            <!-- Orders -->
            <div class="col-md-3">
                <div class="card shadow-sm text-white bg-primary">
                    <div class="card-body">
                        <i class="mdi mdi-cart-outline mdi-36px mb-2"></i>
                        <h5>Orders</h5>
                        <h2>{{ $ordersCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <div class="card shadow-sm text-white bg-success">
                    <div class="card-body">
                        <i class="mdi mdi-tag-multiple mdi-36px mb-2"></i>
                        <h5>Categories</h5>
                        <h2>{{ $categoriesCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-md-3">
                <div class="card shadow-sm text-white bg-warning">
                    <div class="card-body">
                        <i class="mdi mdi-package-variant mdi-36px mb-2"></i>
                        <h5>Products</h5>
                        <h2>{{ $productsCount }}</h2>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-3">
                <div class="card shadow-sm text-white bg-danger">
                    <div class="card-body">
                        <i class="mdi mdi-account-multiple mdi-36px mb-2"></i>
                        <h5>Users</h5>
                        <h2>{{ $usersCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
