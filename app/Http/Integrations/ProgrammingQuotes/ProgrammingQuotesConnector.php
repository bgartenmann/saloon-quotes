<?php

namespace App\Http\Integrations\ProgrammingQuotes;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class ProgrammingQuotesConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://programming-quotes-api.azurewebsites.net/api';
    }
}
