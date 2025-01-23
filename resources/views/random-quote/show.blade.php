@extends('layout')

@section('content')
    
    @include('partials.quote', ['quote' => $quote, 'isFavorite' => false])

    <nav class="mt-10 text-center flex flex-wrap justify-center gap-4">
        <a href="/" class="self-start px-4 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another random quote</a>

        <div class="flex flex-col space-y-4">
            <a href="/author/{{ str_replace(' ', '_', $quote['author']) }}" class="px-4 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show another quote from {{ $quote['author'] }}</a>
            <a href="/author/{{ str_replace(' ', '_', $quote['author']) }}/quotes" class="px-4 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show all quotes from {{ $quote['author'] }}</a>
        </div>
        
        <a href="/favorites" class="self-start px-4 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show my favorites</a>
    </nav>
@endsection