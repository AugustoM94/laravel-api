@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Category Create</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3 text-white">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required minlength="3" maxlength="200">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
