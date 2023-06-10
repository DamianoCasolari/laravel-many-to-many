@extends('layouts.admin')

@section('title', __('View type'))

@section('content')
    {{-- dd($type->projects);  --}}
    <div class="banner container d-flex justify-content-end py-4 shadow-sm">
        <a href="{{ route('admin.types.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to types</a>
    </div>
    <div class="show_page d-flex justify-content-center ">
        <div class="card col-12 border-0 overflow-hidden">
            <div class="fs-1 text-primary bg-light p-3 text-center">Projects of this type</div>
            <div class="card-body bg-light text-dark">

                <div class="text-center mb-5">
                    <div type="button" class="badge text-bg-primary fs-5">
                        {{ $type->name }}
                    </div>
                </div>
                <h4> <b class="text-danger">{{ $type->projects->count() }} </b>Projects </h4>
                <ul>
                    @forelse ($type->projects as $project)
                        <li>
                            <div class="card p-3">
                                <div class="list-unstyled fs-5"><b>title: </b> <span
                                        class="stle-italic">{{ $project->title }}</span>
                                </div>
                                <div class="list-unstyled fs-5"><b>link: </b> <a
                                        href="{{ $project->link }}">{{ $project->link }}</a> </div>

                            </div>
                        </li>
                        <br>
                    @empty
                        <li>
                            <h5>No one</h5>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
