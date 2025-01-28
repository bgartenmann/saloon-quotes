<?php

namespace App\Http\Integrations\ProgrammingQuotes;

use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\AuthenticatedProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Resources\Quotes;
use App\Http\Integrations\ProgrammingQuotes\Resources\Favorites;

class ProgrammingQuotes
{
    protected ProgrammingQuotesConnector $connector;
    protected AuthenticatedProgrammingQuotesConnector $authenticatedConnector;

    public function __construct()
    {
        $this->connector = new ProgrammingQuotesConnector();
    }

    public function quotes(): Quotes
    {
        return new Quotes(connector: $this->connector);
    }

    public function favorites(string $email, string $password): Favorites
    {
        $this->authenticatedConnector = new AuthenticatedProgrammingQuotesConnector(
            email: $email, 
            password: $password
        );

        return new Favorites(
            connector: $this->connector,
            authenticatedConnector: $this->authenticatedConnector,
            email: $email,
            password: $password
        );
    }

}
