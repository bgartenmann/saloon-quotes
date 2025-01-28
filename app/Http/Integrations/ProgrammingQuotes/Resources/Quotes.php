<?php

namespace App\Http\Integrations\ProgrammingQuotes\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Illuminate\Support\Collection;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetRandomQuoteRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthorQuotesRequest;

class Quotes extends BaseResource
{
    public function random(): array
    {
        return $this->connector->send(new GetRandomQuoteRequest())->json();
    }
    
    public function allFromAuthor(string $author): Collection
    {
        return $this->connector->send(new GetAuthorQuotesRequest(author: $author))->collect();
    }

    public function randomFromAuthor(string $author): array
    {
        return $this->allFromAuthor($author)->random();
    }
}