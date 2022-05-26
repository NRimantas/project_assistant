@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- CARD FOR FORM TO CREATE PROJECT --}}
        <div class="card mx-auto" style="width: 28rem;">
            {{-- HEADER --}}
            <div class="card-header">
                {{ __('CREATE NEW STUDENT') }}
                {{-- message if name is taken --}}
                @if ($message = Session::get('name_taken'))
                    <div class="alert alert-danger">
                        <span>{{ $message }}</span>
                    </div>
                @endif
            </div>
            <div class="card-body">
                {{-- FORM FOR CREATE STUDENT --}}
                <form action="{{ route('student.store', $project) }}" method="POST">
                    @csrf
                    {{-- full name input --}}
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Student full Name</label>
                        <input type="text" name="full_name" class="form-control">

                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
