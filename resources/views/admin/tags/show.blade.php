@extends('layouts.admin')

@section('title', __('View tag'))

@section('content')
    {{-- dd($tag->projects);  --}}
    <div class="banner container d-flex justify-content-end py-4 shadow-sm">
        <a href="{{ route('admin.tags.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to tags</a>
    </div>
    <div class="show_page d-flex justify-content-center ">
        <div class="card col-12 border-0 overflow-hidden">
            <div class="fs-1 text-primary bg-light p-3 text-center">Projects of this Technology</div>
            <div class="card-body bg-light text-dark">

                <div class="text-center mb-5">
                    <div type="button" class="badge text-bg-primary fs-5">
                        {{ $tag->name }}
                    </div>
                </div>
                <h4> <b class="text-danger">{{ $tag->projects->count() }} </b>Projects </h4>
                <ul>
                    @forelse ($tag->projects as $project)
                        <li class="list-unstyled">
                            <div class="card p-3">
                                <div class=" fs-5"><b>title: </b> <span class="stle-italic">{{ $project->title }}</span>
                                </div>
                                <div class=" fs-5"><b>Languages: </b>
                                    @foreach ($project->tags as $technologies)
                                        @if ($technologies->name == $tag->name)
                                            <span class="fw-bold text-danger">{{ $technologies->name }} </span>
                                        @else
                                            <span class="">{{ $technologies->name }} </span>
                                        @endif
                                        @if (!$loop->last)
                                            <span>,</span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class=" fs-5"><b>link: </b> <a href="{{ $project->link }}">{{ $project->link }}</a>
                                </div>

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
