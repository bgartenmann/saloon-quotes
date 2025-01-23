@extends('layout')

@section('content')
    
    @include('partials.quote', ['quote' => $quote])

    <nav class="mt-10 text-center flex justify-center space-x-4">
        <a href="/" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another random quote</a>

        <a href="/author/{{ str_replace(' ', '_', $quote['author']) }}" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another quote from {{ $quote['author'] }}</a>
        <a href="/author/{{ str_replace(' ', '_', $quote['author']) }}/quotes" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show all quotes from {{ $quote['author'] }}</a>
    </nav>
@endsection