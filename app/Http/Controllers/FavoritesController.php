<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\AuthenticatedProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Requests\AddToFavoritesRequest;

class FavoritesController extends Controller
{
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
