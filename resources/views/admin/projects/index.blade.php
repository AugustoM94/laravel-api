@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class="my-4 text-danger">Projects List</h1>

        <a href="{{ route('admin.projects.create') }}" class="btn btn-danger mb-4">Add Project</a>

        @if(session()->has('message'))
            <div class="alert alert-success mt-4">{{ session()->get('message') }}</div>
        @endif

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                          <td><a href="{{ $project->link }}">{{ $project->link }}</a></td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-1"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$projects->links('vendor.pagination.bootstrap-5')}}
    </section>
@endsection
