@extends('layout')

@section('content')
    <figure class="text-center p-10 bg-lime-400 rounded shadow-xl shadow-lime-200">
        <blockquote class="font-bold text-3xl ">{{ $quote }}</blockquote>
        <figcaption class="italic mt-2">
            Random Author
        </figcaption>
    </figure>

    <nav class="mt-10 text-center">
        <a href="/" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another random quote</a>
    </nav>
@endsection