@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- CARD FOR FORM TO CREATE PROJECT --}}
        <div class="card mx-auto" style="width: 28rem;">
            {{-- HEADER --}}
            <div class="card-header">
                {{ __('CREATE NEW PROJECT') }}
            </div>
            <div class="card-body">
                {{-- FORM FOR CREATE PROJECT --}}
                <form action="{{ route('project.store') }}" method="POST">
                    @csrf
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Project title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    {{-- input number of groups --}}
                    <div class="mb-3">
                        <label for="groups_number" class="form-label">Number of groups</label>
                        <input type="number" class="form-control" min="1" max="5" name="groups_number" />
                    </div>
                    {{-- input number of students --}}
                    <div class="mb-3">
                        <label for="students_group" class="form-label">Students per group</label>
                        <input type="number" class="form-control" min="2" name="students_number" />
                    </div>
                    <button type="submit"class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
