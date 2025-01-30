<?php

namespace App\Http\Integrations\ProgrammingQuotes\Auth;

use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthTokenRequest;

class DynamicTokenAuthenticator implements Authenticator
{
    public function __construct(
        protected string $email,
        protected string $password,
    )
    {}

    public function set(PendingRequest $pendingRequest): void
    {
        if ($pendingRequest->getRequest() instanceof GetAuthTokenRequest) {
            return;
        }
        
        $authResponse = $pendingRequest->getConnector()->send(new GetAuthTokenRequest($this->email, $this->password));
        $pendingRequest->headers()->add('Authorization', 'Bearer ' . $authResponse->json('token'));
    }
}
