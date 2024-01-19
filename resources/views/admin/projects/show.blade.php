@extends('layouts.app')
@section('content')
    <section class="container my-4">
        <h1 class="text-danger mb-3">{{ $project->title }}</h1>
        <div class="card w-50 bg-dark text-white border-white">
            <div class="card-body">
                <h5 class="card-title text-primary ">Title: {{ $project->title }}</h5>
                <p class="card-text">{{ $project->body }}</p>
                <p class="text-danger">Category: {{$project->category ? $project->category->name : 'No category' }}</p>

                @forelse($project->technologies as $technology)
                    <p>Tecnology: {{ $technology->name }} <i class="{{ $technology->icon }}"></i></p>
                    @empty
                    <p>No technologies</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
