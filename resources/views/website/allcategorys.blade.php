@extends('website.layouts.app')
@section('content')
<div class="container-fluid">
<section class="section container my-5">

<div class="row gap-3">
    @foreach ($categorys as  $category)
    <div class="card gap-3" style="width: 14rem;">
      <div class="card-body text-center ">
        <h4 class="card-title">{{ $category->name }}</h4>
      </div>
    </div>
    @endforeach
</div>

</section>
</div>
@endsection