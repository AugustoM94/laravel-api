@extends('layouts.app')
@section('content')
    <section class="container my-4">
        <h1 class="text-danger">{{ $category->name }}</h1>
        <div class="card w-50 bg-dark text-white border-white">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                    <ul>
                @forelse ($category->projects as $project)
                <li>{{$project->title}}</li>
                @empty
                    
                <li>No project</li>
                @endforelse
                    </ul>
            </div>
        </div>
    </section>
@endsection