<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Service;
use BaglanS\Doma\Helpers\Exceptions\RequestException;
use \Exception;

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
        $headers = [];

        if (!$withoutToken) {
            $headers = ['Authorization' => 'Bearer ' . $this->getClient()->getAccessToken()];
        }

        try {
            return $this->getHttpClient()->post('', [
                'headers' => $headers,
                'json' => ['query' => $query, 'variables' => $variables]
            ]);
        } catch (Exception $e) {
            throw new RequestException($this->getClient()->getRequestContainer(), $e->getMessage());
        }
    }
}