<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetRandomQuoteRequest;

class RandomQuoteController extends Controller
{
    public function show()
    {
        $connector = new ProgrammingQuotesConnector();
        $request = new GetRandomQuoteRequest();
        $response = $connector->send($request);

        $randomQuote = $response->json();
        
        return view('random-quote.show', [
            'quote' => $randomQuote,
        ]);
    }
}
