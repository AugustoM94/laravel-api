@extends('layouts.app')
@section('content')
    <section class="container">
        @auth
            <h1>Benvenuto  {{ Auth::user()->name }}</h1>
        @else
            <h1>Bentornato</h1>
        @endauth
    </section>
@endsection
