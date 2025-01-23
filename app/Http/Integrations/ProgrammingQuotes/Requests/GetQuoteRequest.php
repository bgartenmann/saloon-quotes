<?php

namespace App\Http\Integrations\ProgrammingQuotes\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetQuoteRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        private string $id
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/quotes/' . $this->id;
    }
}
