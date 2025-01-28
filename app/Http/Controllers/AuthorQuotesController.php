<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotes;

class AuthorQuotesController extends Controller
{
    public function index()
    {
        $programmingQuotes = new ProgrammingQuotes();
        $quotes = $programmingQuotes->quotes()->allFromAuthor(request('author'));
        
        return view('authors-quote.index', [
            'author' => str_replace('_', ' ', request('author')),
            'quotes' => $quotes,
        ]);
    }

    public function show()
    {
        $programmingQuotes = new ProgrammingQuotes();
        $randomQuote = $programmingQuotes->quotes()->randomFromAuthor(request('author'));
        
        return view('random-quote.show', [
            'quote' => $randomQuote,
        ]);
    }
}
