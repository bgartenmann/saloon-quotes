<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthorQuotesRequest;

class AuthorQuotesController extends Controller
{
    public function index()
    {
        $connector = new ProgrammingQuotesConnector();
        $request = new GetAuthorQuotesRequest(author: request('author'));
        $response = $connector->send($request);

        $quotes = $response->collect();
        
        return view('authors-quote.index', [
            'author' => str_replace('_', ' ', request('author')),
            'quotes' => $quotes,
        ]);
    }

    public function show()
    {
        $connector = new ProgrammingQuotesConnector();
        $request = new GetAuthorQuotesRequest(author: request('author'));
        $response = $connector->send($request);

        $randomQuote = $response->collect()->random();
        
        return view('random-quote.show', [
            'quote' => $randomQuote,
        ]);
    }
}
