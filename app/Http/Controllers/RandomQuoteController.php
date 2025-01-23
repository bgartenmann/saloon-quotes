<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomQuoteController extends Controller
{
    public function show()
    {
        $quotes = [
            'You are a great person!',
            'You are doing well!',
            'You are awesome!',
            'You are amazing!',
            'You are the best!',
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        return view('random-quote.show', [
            'quote' => $randomQuote,
        ]);
    }
}
