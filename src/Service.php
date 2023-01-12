<?php

namespace BaglanS\Doma;

use BaglanS\Doma\Client;
use BaglanS\Doma\Helpers\GraphqlHelper;

class Service
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    
}