@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class="my-4 text-danger">Categories List</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-danger mb-4">Add Project</a>

        @if(session()->has('message'))
            <div class="alert alert-success mt-4">{{ session()->get('message') }}</div>
        @endif

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                    <th>Additional Links</th> <!-- Nuova colonna per i link aggiuntivi -->
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                          <td><a href="{{ $category->link }}">{{ $category->link }}</a></td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
