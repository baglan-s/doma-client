<?php

namespace BaglanS\Doma;

use BaglanS\Doma\Client;
use BaglanS\Doma\Helpers\GraphqlHelper;

class Serivce
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    
}