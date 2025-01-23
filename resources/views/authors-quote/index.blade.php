@extends('layout')

@section('content')

    <h1 class="text-4xl text-center">All quotes from {{ $author }}</h1>

    <section class="space-y-4 mt-10">
        @foreach ($quotes as $quote)
            @include('partials.quote', ['quote' => $quote])
        @endforeach
    </section>

    <nav class="mt-10 text-center flex justify-center space-x-4">
        <a href="/" class="px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Show a random quote</a>
    </nav>
@endsection