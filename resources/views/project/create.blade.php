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
                <form action="" method="POST">
                    @csrf
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Project title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title_message')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- input number of groups --}}
                    <div class="mb-3">
                        <label for="groups" class="form-label">Number of groups</label>
                        <input type="number" name="numberof" class="form-control" min="1" />
                        @error('group_message')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- input number of students --}}
                    <div class="mb-3">
                        <label for="students_group" class="form-label">Students per group</label>
                        <input type="number" name="numberof" class="form-control" min="2" />
                        @error('students_group')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
