@extends('dashboard.app')

@section('title', 'PERUJI')

@section('content')

@include('dashboard.sidebar')
<div class="loading-container">
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
</div>
@include('dashboard.upcoming-events')
@include('dashboard.previous-events')
@include('dashboard.newsroom')
@include('dashboard.admin-emails')
<script load-container>
    content_container = document.querySelector(`.content-container.${sessionStorage.getItem("active_menu")}`);
    content_container.classList.add("show");
</script>
@endsection