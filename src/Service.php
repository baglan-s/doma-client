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

    protected $modelNamespace = '\BaglanS\Doma\Models\\';

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

    public function getModel($modelName)
    {
        $model = $this->modelNamespace . ucfirst($modelName);

        return new $model($this);
    }
}