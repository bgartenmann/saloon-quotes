<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\AuthenticatedProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthTokenRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetQuoteRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\AddToFavoritesRequest;

class FavoritesController extends Controller
{

    public function index()
    {
        $connector = new ProgrammingQuotesConnector();
        $response = $connector->send(new GetAuthTokenRequest(email: 'testing@example.com', password: 'test1234'));
        $favorite_ids = $response->collect('user.favorites');

        $favorites = $favorite_ids->map(function ($id) use ($connector) {
            $response = $connector->send(new GetQuoteRequest(id: $id));
            return $response->json();
        });

        return view('favorites.index', [
            'quotes' => $favorites,
        ]);
    }

    public function store()
    {
        $connector = new AuthenticatedProgrammingQuotesConnector(
            email: 'testing@example.com', 
            password: 'test1234'
        );
        $request = new AddToFavoritesRequest(id: request('id'));
        $response = $connector->send($request);
        
        if ($response->status() === 200) {
            return back()->with('success', 'Quote added to favorites!');
        } else {
            return back()->with('error', 'Failed to add quote to favorites!');
        }
    }
}
