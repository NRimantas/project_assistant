@extends('layouts.app')
@section('content')
    {{-- LINK TO CREATE NEW PROJECT --}}
    <div class="container">


        {{-- PROJECTS LIST --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <strong>{{ __('PROJECTS') }}</strong>
                        <div
                            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            <a href="{{ route('project.create') }}" class="btn btn-warning">START NEW PROJECT</a>
                        </div>
                    </div>
                    {{-- message when project created --}}
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        {{-- if project title already exists --}}
                        <div class="card-body">
                            @if ($message = Session::get('title'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {{-- table --}}
                            <table class="table table-bordered">
                                <thead>
                                    <th>Project Id</th>
                                    <th>Title</th>
                                    <th>Groups per project</th>
                                    <th>Students per group</th>
                                    <th>Project created</th>
                                    <th colspan="2">Actions</th>

                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->groups_number }}</td>
                                            <td>{{ $project->students_number }}</td>
                                            <td>{{ $project->created_at }}</td>
                                            {{-- show project --}}
                                            <td><a href="{{ route('project.show', $project) }}"
                                                    class="btn btn-sm btn-secondary mb-2">Show</a>
                                                {{-- edit project --}}
                                                <a href="{{ route('project.edit', $project) }}" class="btn btn-sm btn-warning mb-2">EDIT</a>
                                                {{-- delete PROJECT --}}
                                                <form action="{{ route('project.delete', $project) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
