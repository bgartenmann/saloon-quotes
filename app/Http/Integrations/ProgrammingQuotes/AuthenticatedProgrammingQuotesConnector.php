<?php

namespace App\Http\Integrations\ProgrammingQuotes;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Http\PendingRequest;
use Saloon\Http\Auth\TokenAuthenticator;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthTokenRequest;

class AuthenticatedProgrammingQuotesConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected string $email,
        protected string $password,
    ) {}

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://programming-quotes-api.azurewebsites.net/api';
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        if ($pendingRequest->getRequest() instanceof GetAuthTokenRequest) {
            return;
        }
        
        $authResponse = $this->send(new GetAuthTokenRequest($this->email, $this->password));
        $pendingRequest->authenticate(new TokenAuthenticator($authResponse->json()['token']));
    }
}
