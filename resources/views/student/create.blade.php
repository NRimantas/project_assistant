@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- CARD FOR FORM TO CREATE PROJECT --}}
        <div class="card mx-auto" style="width: 28rem;">
            {{-- HEADER --}}
            <div class="card-header">
                {{ __('CREATE NEW STUDENT') }}
            </div>
            <div class="card-body">
                {{-- FORM FOR CREATE STUDENT --}}
                <form action="{{ route('student.store', $project->id) }}" method="POST">
                    @csrf
                    {{-- full name and group  inputs--}}
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Student full Name</label>
                        <input type="text" name="full_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="group_num" class="form-label">Assign to group:</label>
                        <input type="number" name="group_num" class="form-control" min="1" max="5">
                    </div>
                    <button type="submit"class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
