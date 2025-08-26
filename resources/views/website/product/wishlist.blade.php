@extends('website.layouts.app')
@section('content')
@auth
    <livewire:favorite-list />
@endauth

@endsection