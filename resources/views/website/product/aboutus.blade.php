@extends('website.layouts.app')
@section('content')

<div class="container py-5">
  <!-- عنوان -->
  <section class="text-center mb-5">
    <h2 class="mb-3">About Us</h2>
    <p class="text-muted w-75 mx-auto">
      Welcome to <strong>Ra3d Store</strong>, your trusted destination for quality products. 
      We aim to provide our customers with the best shopping experience, combining excellent service with top-notch items.
    </p>
  </section>

  <!-- من نحن -->
  <section class="row align-items-center mb-5">
    <div class="col-md-6">
      <img src="{{ asset('assets/images/logo1.png') }}" alt="About Image" class="img-fluid rounded shadow">
    </div>
    <div class="col-md-6">
      <h4>Who We Are</h4>
      <p class="text-muted">
        We are a passionate team dedicated to delivering high-quality products at affordable prices. 
        Our mission is to make online shopping simple, enjoyable, and reliable for everyone. 
        We carefully choose each product to ensure it meets our quality standards.
      </p>
    </div>
  </section>

  <!-- المميزات -->
  <section class="my-5">
    <h4 class="text-center mb-4">Why Choose Us?</h4>
    <div class="row text-center">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-4">
          <i class="bi bi-truck fs-1 text-success mb-3"></i>
          <h5>Fast Delivery</h5>
          <p class="text-muted">We ensure your products reach you as quickly and safely as possible.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-4">
          <i class="bi bi-shield-check fs-1 text-success mb-3"></i>
          <h5>Trusted Quality</h5>
          <p class="text-muted">Every product is carefully inspected before being added to our store.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-4">
          <i class="bi bi-people fs-1 text-success mb-3"></i>
          <h5>Customer Support</h5>
          <p class="text-muted">Our support team is always ready to help you with your needs.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- الفريق -->
  <section class="my-5">
  <h2 class="text-center mb-4">Meet Our Ra3d Team</h2>
  <div class="row justify-content-center text-center">
    
    <!-- Hussien -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('assets/images/team/hussien.jpg')}}" class="card-img-top" alt="Hussien Anwar">
        <div class="card-body">
          <h5 class="card-title">Hussien</h5>
          <p class="text-muted">Backend Developer <br> & Frontend Developer</p>
        </div>
      </div>
    </div>

    <!-- Sayed -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('assets/images/team/sayed.jpg')}}" class="card-img-top" alt="Sayed">
        <div class="card-body">
          <h5 class="card-title">Mohamed Sayed</h5>
          <p class="text-muted">UI/UX Designer</p>
        </div>
      </div>
    </div>


    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('assets/images/team/hussien&sayed.jpg')}}" class="card-img-top" alt="Zoz">
        <div class="card-body">
          <h5 class="card-title">hussien & Mohamed</h5>
          <p class="text-muted">Marketing Manager</p>
        </div>
      </div>
    </div>
    

    

  </div>
</section>
</div>
@endsection
