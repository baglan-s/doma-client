<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Service;

class Model
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function getClient()
    {
        return $this->getService()->getClient();
    }

    public function getHttpClient()
    {
        return $this->getClient()->getHttpClient();
    }

    public function sendQuery($query, $variables = [], $withoutToken = false)
    {
        return $this->getHttpClient()->post('', [
            'headers' => ['Authorization' => 'Bearer ' . !$withoutToken ? $this->getClient()->getAccessToken() : ''],
            'json' => ['query' => $query, 'variables' => $variables]
        ]);
    }
}