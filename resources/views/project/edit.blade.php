@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- CARD FOR FORM TO CREATE PROJECT --}}
        <div class="card mx-auto" style="width: 28rem;">
            {{-- HEADER --}}
            <div class="card-header">
                {{ __('EDIT PROJECT') }}
                {{-- if title already exists --}}
                @if ($message = Session::get('title'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
            <div class="card-body">
                {{-- FORM FOR EDIT PROJECT --}}
                <form action="{{ route('project.update', $project) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Project title</label>
                        <input type="text" name="title" class="form-control" value="{{ $project->title }}">
                    </div>
                    {{-- input number of groups --}}
                    <div class="mb-3">
                        <label for="groups_number" class="form-label">Number of groups</label>
                        <input type="number" class="form-control" min="1" max="5" name="groups_number"
                            value="{{ $project->groups_number }}" />
                    </div>
                    {{-- input number of students --}}
                    <div class="mb-3">
                        <label for="students_group" class="form-label">Students per group</label>
                        <input type="number" class="form-control" min="2" name="students_number"
                            value="{{ $project->students_number }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </form>
            </div>
        </div>
    </div>
@endsection
