@extends('layout')

@section('content')
    <figure class="text-center p-10 bg-lime-400 rounded shadow-xl shadow-lime-200">
        <blockquote class="font-bold text-3xl ">{{ $quote['text'] }}</blockquote>
        <figcaption class="italic mt-2">
            &mdash; {{ $quote['author'] }}
        </figcaption>
    </figure>

    <nav class="mt-10 text-center flex justify-center space-x-4">
        <a href="/" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another random quote</a>
        <a href="/author/{{ str_replace(' ', '_', $quote['author']) }}" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another quote from {{ $quote['author'] }}</a>
    </nav>
@endsection