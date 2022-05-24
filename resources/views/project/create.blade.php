@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('CREATE NEW PROJECT') }}
            </div>
            <div class="card-body">

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="form-label">Project title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="groups" class="form-label">Number of groups</label>
                        <input type="number" name="numberof" class="form-control" min="1" />
                        @error('groups')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
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
