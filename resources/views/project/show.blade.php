@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row my-2">
            <div class="col">
                <p>Project: <strong> {{ $project->title }}</strong></p>
                <p>Number of groups: <strong> {{ $project->groups_number }}</strong></p>
                <p>Students per group: <strong> {{ $project->students_group }}</strong></p>

                <a href=" {{ route('project.index') }} " class="btn btn-secondary">Projects list</a>
            </div>
        </div>
        {{-- Students table --}}
        <div class="row my-4">
            <div class="col-5">
                <h2>Students</h2>
                 {{-- table --}}
                 <table class="table table-bordered">
                    <thead>
                        <th>Full Name</th>
                        <th>Group</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->group_num }}</td>
                                {{-- <td><a href="{{ route('project.delete', $student->id )}}" class="btn btn-danger">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
