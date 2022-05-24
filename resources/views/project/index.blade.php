@extends('layouts.app')
@section('content')
    {{-- LINK TO CREATE NEW PROJECT --}}
    <div class="container">
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <a href="{{ route('project.create')}}" class="btn btn-warning">START NEW PROJECT</a>
        </div>
    </div>
@endsection
