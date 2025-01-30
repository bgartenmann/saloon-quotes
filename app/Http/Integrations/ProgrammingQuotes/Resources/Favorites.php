<?php

namespace App\Http\Integrations\ProgrammingQuotes\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Saloon\Http\Connector;
use Illuminate\Support\Collection;
use App\Http\Integrations\ProgrammingQuotes\ProgrammingQuotesConnector;
use App\Http\Integrations\ProgrammingQuotes\Auth\DynamicTokenAuthenticator;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetQuoteRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\GetAuthTokenRequest;
use App\Http\Integrations\ProgrammingQuotes\Requests\AddToFavoritesRequest;

class Favorites extends BaseResource
{

   public function __construct(
      readonly protected Connector $connector,
      private string $email,
      private string $password,
   ) {}

   public function all(): array
   {
      $favoriteIds = $this->connector->send(new GetAuthTokenRequest(
         email: $this->email, 
         password: $this->password
      ))->collect('user.favorites');

      $favorites = $favoriteIds->map(function ($id) {
         return $this->connector->send(new GetQuoteRequest(id: $id))->json();
      })->all();

      return $favorites;
   }
   
   public function add(string $id): Response
   {
      return $this->connector->authenticate(new DynamicTokenAuthenticator(
         email: $this->email,
         password: $this->password
      ))->send(new AddToFavoritesRequest(id: $id));
   }
}