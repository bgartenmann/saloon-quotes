<?php

namespace App\Http\Integrations\ProgrammingQuotes\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class AddToFavoritesRequest extends Request
{   
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        private string $id
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/quotes/favorite/' . $this->id;
    }
}
