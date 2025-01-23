<figure class="text-center p-10 bg-lime-400 rounded shadow-xl shadow-lime-200">
    <blockquote class="font-bold text-3xl ">{{ $quote['text'] }}</blockquote>
    <figcaption class="italic mt-2">
        &mdash; {{ $quote['author'] }}
    </figcaption>
    
    @if (!$isFavorite)
        <form action="/favorites" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $quote['_id'] }}">
            <button type="submit" class="mt-4 px-2 py-1 border border-stone-500 rounded hover:bg-lime-100 hover:shadow hover:shadow-lime-200">Add to favorites</button>
        </form>
    @endif
</figure>