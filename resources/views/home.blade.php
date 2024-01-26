@extends('layouts.app')
<body>
@section('content')
    <section class="container">
        @auth
            <h1 class="text-light">Benvenuto  {{ Auth::user()->name }}</h1>
        @else
            <h1>Bentornato</h1>
        @endauth
    </section>
@endsection

</body>


<style>

body{
    background-image: url(https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg);
    background-size:cover;
}
</style>
