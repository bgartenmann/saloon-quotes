<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotes;

class RandomQuoteController extends Controller
{
    public function show()
    {
        $programmingQuotes = new ProgrammingQuotes();
        $randomQuote = $programmingQuotes->quotes()->random();
        
        return view('random-quote.show', [
            'quote' => $randomQuote,
        ]);
    }
}
