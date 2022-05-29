@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row my-2">
            <div class="col">
                <p>Project: <strong> {{ $project->title }}</strong></p>
                <p>Number of groups: <strong> {{ $project->groups_number }}</strong></p>
                <p>Students per group: <strong> {{ $project->students_number }}</strong></p>

                <a href=" {{ route('project.index') }} " class="btn btn-secondary">Projects list</a>
            </div>
        </div>
        {{-- Students table --}}
        <div class="row my-4">
            <div class="col-5">
                <h2>Students</h2>
                {{-- message when student created --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                {{-- if student already exists --}}
                @if ($message = Session::get('err'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
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
                                <td>
                                    {{-- find students with group number --}}
                                    @php
                                        $group = $student
                                            ->groups()
                                            ->where('student_id', $student->id)
                                            ->where('project_id', $project->id)
                                            ->first();
                                    @endphp
                                    @if ($group)
                                        #{{ $group->group_num }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{-- delete student --}}
                                    <form action="{{ route('student.delete', $student->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('student.create', $project) }}" class="btn btn-secondary">Add new student</a>
            </div>
        </div>

        <div class="col-5">
            <div class="row my-4">
                <h1>Groups</h1>
                {{-- message if created --}}
                @if ($message = Session::get('group'))
                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                    </div>
                @endif
                {{-- message if student assigned already --}}
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <span>{{ $message }}</span>
                    </div>
                @endif

            </div>
        </div>
        {{-- group tables --}}
        @for ($i = 1; $i <= $project->groups_number; $i++)
            <div class="col-3 me-3">
                <table class="table table-bordered text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>Group #{{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- group table rows --}}
                        @for ($j = 0; $j < $project->students_number; $j++)
                            <tr>
                                <td>
                                    {{-- form to select student --}}
                                    <form action="{{ route('group.store') }}" onchange="submit();" method="POST">
                                        @csrf
                                        {{-- Select student --}}
                                        <select name="full_name" class="form-select" id="full_name">
                                            <option value="">Assign student</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->full_name }}">{{ $student->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                        <input type="hidden" name="group_num" value="{{ $i }}">
                                    </form>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endfor
    </div>
@endsection
