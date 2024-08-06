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

        foreach ($requestContainer as $transaction) {
            $messages['data'][] = [
                'request' => [
                    'method' => $transaction['request']?->getMethod(),
                    'body' => $transaction['request']?->getBody()->getContents(),
                ],
                'response' => [
                    'code' => $transaction['response']?->getStatusCode(),
                    'heaeders' => $transaction['response']?->getHeaders(),
                    'body' => $transaction['response']?->getBody()->getContents(),
                ]
            ];
        } 

        return json_encode($messages);
    }
}