@extends('layouts.app')

@section('content')
<section class="container">
        <h1 class="my-4 text-danger">technologies List</h1>

        <a href="{{ route('admin.technologies.create') }}" class="btn btn-danger mb-4">Add technology</a>

        @if(session()->has('message'))
            <div class="alert alert-success mt-4">{{ session()->get('message') }}</div>
        @endif

        <ul class="list-group my-3">
            <li class="list-group-item d-flex align-items-center justify-content-between bg-dark text-white">
                <h3>Name</h3>
                <div class="d-flex">
                    <span class="mx-2 btn btn-primary">Show</span>
                    <span class="mx-2 btn btn-secondary">Edit</span>
                    <span class="mx-2 btn btn-danger">Delete</span>
                </div>
            </li>
        </ul>

        <ul class="list-group">
            @foreach($technologies as $technology)
                <li class="list-group-item d-flex align-items-center justify-content-between bg-dark text-white">
                    {{ $technology->name }}
                    <div class="d-flex">
                        <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-primary mx-2"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-secondary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="mx-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

    </section>
@endSection