@extends('layouts.admin')


@section('content')
    <div class="banner py-2 shadow-sm">
        <h1 class="px-2 text-primary">Show projects table</h1>
        <a class="btn btn-dark m-2 " href="{{ route('admin.projects.create') }}" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add new Projectt</a>
    </div>
    @include('profile.partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light ">

                <tr class="text-center my-2">
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">


                @forelse ($projects as $project)
                    <tr class="table-primary pointer text-center" {{-- onclick="window.location.href = '{{ route('admin.projects.show', $project) }}';" --}}>
                        <td scope="row" onclick="window.location.href = '{{ route('admin.projects.show', $project) }}';">
                            {{ $project->id }}</td>
                        <td onclick="window.location.href = '{{ route('admin.projects.show', $project) }}';"><img
                                height="100" src="{{ $project->logo }}" alt="{{ $project->title }}"></td>
                        <td onclick="window.location.href = '{{ route('admin.projects.show', $project) }}';">
                            {{ $project->title }}</td>
                        <td onclick="window.location.href = '{{ route('admin.projects.show', $project) }}';">
                            {{ $project->link }}</td>

                        <td class="buttons_container text-center">
                            {{-- <a name="" id="" class="btn btn-primary my-1 fs_13"
                                href="{{ route('admin.projects.show', $project) }}" role="button"> <i class="fa fa-eye"
                                    aria-hidden="true"></i></a> --}}
                            <a name="" id="" class="btn btn-primary grow my-1 fs_13"
                                href="{{ route('admin.projects.edit', $project) }}" role="button"><i
                                    class="fa-solid fa-pen-to-square"></i> </a>

                            <button type="button" class="btn btn-danger grow my-1 fs_13" data-bs-toggle="modal"
                                data-bs-target="#project-delete-{{ $project->id }}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>

                        </td>

                    </tr>
                    <!-- MODAL -->

                    <div class="modal fade" id="project-delete-{{ $project->id }}" tabindex="-1"
                        aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTitle-{{ $project->id }}">
                                        {{ 'You are about to delete "' . $project->title . '"' }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete <b>{{ $project->title }}</b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No project yet.</td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
