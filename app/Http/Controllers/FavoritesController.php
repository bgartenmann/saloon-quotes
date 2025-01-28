<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotes;

class FavoritesController extends Controller
{
    // email and password are hardcoded for demonstration purposes
    // these would come from the authenticated user in a real application
    public function __construct(
        private String $email = 'testing@example.com',
        private String $password = 'test1234',
    ) {}

    public function index()
    {
        $programmingQuotes = new ProgrammingQuotes();
        $favorites = $programmingQuotes->favorites(email: $this->email, password: $this->password)->all();

        return view('favorites.index', [
            'quotes' => $favorites,
        ]);
    }

    public function store()
    {
        $programmingQuotes = new ProgrammingQuotes();
        $response = $programmingQuotes->favorites(email: $this->email, password: $this->password)->add(request('id'));
        
        if ($response->status() === 200) {
            return back()->with('success', 'Quote added to favorites!');
        } else {
            return back()->with('error', 'Failed to add quote to favorites!');
        }
    }
}
