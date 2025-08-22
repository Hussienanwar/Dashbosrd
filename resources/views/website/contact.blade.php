@extends('website.layouts.app')
@section('content')

<div class="container py-5">
    <h2 class="text-center mb-4">Contact Us</h2>

    <div class="row">
        <!-- نموذج التواصل -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Send Us a Message</h5>

                  @if(session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  
                  <form action="{{ route('contact.store') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" required>
                      </div>
                  
                      <div class="mb-3">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" required>
                      </div>
                  
                      <div class="mb-3">
                          <label for="phone"> Phone Number</label>
                          <input type="text" name="phone" class="form-control" required>
                      </div>
                  
                     <div class="mb-3">
                         <label for="message">Message</label>
                         <textarea name="message" class="form-control" rows="4" required></textarea>
                     </div>
                     
                      <button type="submit" class="btn btn-primary">Send</button>
                  </form>

                </div>
            </div>
        </div>

        <!-- تفاصيل الاتصال -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Contact Information</h5>
                    <p><i class="fas fa-envelope me-2"></i> ra3d@gmail.com</p>
                    <p><i class="fas fa-phone me-2"></i> +20 1202145780</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main Street, Cairo, Egypt</p>

                    <!-- خريطة Google (اختياري) -->
                    <div class="mt-3">
                        <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1744.613262531657!2d31.084536997583367!3d29.01028288489509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a2560e14a5871%3A0x1ae3f6e92e8862a4!2z2KjZhtmKINiz2YjZitmB2Iwg2KjZitin2LYg2KfZhNi52LHYqNiMINio2YbZiSDYs9mI2YrZgSDYp9mE2KzYr9mK2K_YqdiMINmF2K3Yp9mB2LjYqSDYqNmG2Yog2LPZiNmK2YEgMjczMDIyNQ!5e0!3m2!1sar!2seg!4v1755695018593!5m2!1sar!2seg" 
                        width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
