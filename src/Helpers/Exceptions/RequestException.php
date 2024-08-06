<?php

namespace BaglanS\Doma\Helpers\Exceptions;

use \Exception;
use \Throwable;

class RequestException extends Exception
{
    public function __construct(array $requestContainer, $message, $code = 0, Throwable $previous = null) {
        parent::__construct($this->processMessage($requestContainer, $message), $code, $previous);
    }

    private function processMessage(array $requestContainer, string $message): string
    {
        $messages = [
            'error' => $message,
            'data' => []
        ];

        if (isset($requestContainer[0])) {
            $messages['data'][] = [
                'request' => [
                    'method' => $requestContainer[0]['request']?->getMethod(),
                    'body' => $requestContainer[0]['request']?->getBody()->getContents(),
                ],
                'response' => [
                    'code' => $requestContainer[0]['response']?->getStatusCode(),
                    'heaeders' => $requestContainer[0]['response']?->getHeaders(),
                    'body' => $requestContainer[0]['response']?->getBody()->getContents(),
                ]
            ];
        }

        if (isset($requestContainer[count($requestContainer) - 1])) {
            $container = $requestContainer[count($requestContainer) - 1];
            $messages['data'][] = [
                'request' => [
                    'method' => $container['request']?->getMethod(),
                    'body' => $container['request']?->getBody()->getContents(),
                ],
                'response' => [
                    'code' => $container['response']?->getStatusCode(),
                    'heaeders' => $container['response']?->getHeaders(),
                    'body' => $container['response']?->getBody()->getContents(),
                ]
            ];
        }

        foreach ($requestContainer as $transaction) {
            
        } 

        return json_encode($messages);
    }
}