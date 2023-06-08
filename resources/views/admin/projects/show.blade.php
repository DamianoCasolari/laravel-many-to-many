@extends('layouts.admin')

@section('title', $project->title)
@section('content')
    <div class="banner container d-flex justify-content-end py-4 shadow-sm">
        <a href="{{ route('admin.projects.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to index</a>
    </div>
    <div class="container d-flex flex-column justify-content-around">
        <h3 class="my-4 text-center">{{ $project->title }}</h3>
        <a href="{{ $project->link }}">
            <p class="card-text text-center">{{ $project->link }}</p>
        </a>

        <div class="img_cotainer m-4 text-center">
            <img class="img-fluid drop_shadow" src="{{ $project->logo }}" alt="{{ $project->title }}">

        </div>
        <div class="info_container text-dark py-3 ">
            <h6 class="card-subtitle mb-2 text-muted mb-3"><b> Languages :</b> <br>
                <span class="ms-3 ">{{ $project->languages_used }}</span>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted"><b> Description :</b> <br>
                <span class="ms-3 "> {{ $project->functionality }}</span>
            </h6>

            <hr>
            <h5 class="card-title text-end ">{{ $project->price }}</h5>
        </div>
    </div>
@endsection
