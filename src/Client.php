<?php

namespace BaglanS\Doma;

use GuzzleHttp\Client as HttpClient;
use BaglanS\Doma\Config;
use BaglanS\Doma\Helpers\GraphqlHelper;

class Client
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * @var string
     */
    protected $idToken;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->httpClient = new HttpClient;
        $this->config->setState(bin2hex(random_bytes(5)));
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->accessRefreshToken;
    }

    /**
     * @return string
     */
    public function getIdToken(): string
    {
        return $this->idToken;
    }

    /**
     * @return string
     */
    public function getOauthUrl(): string
    {
        $params = http_build_query([
            'client_id' => $this->config->getClientId(),
            'client_secret' => $this->config->getClientSecret(),
            'redirect_uri' => $this->config->getRedirectUri(),
            'scope' => $this->config->getScope(),
            'state' => $this->config->getState(),
            'response_type' => 'code',
        ]);

        return $this->config->getOidcAuthEndpoint() . '?' . $params;
    }

    /**
     * @return string
     */
    public function getAuthorizationBasicToken(): string
    {
        return 'Basic ' . base64_encode($this->config->getClientId() . ':' . $this->config->getClientSecret());
    }

    /**
     * @return array
     */
    public function getAuthenticatedUser(): array
    {
        try {
            $response = $this->httpClient->post('', [
                'headers' => ['Authorization' => 'Bearer ' . $this->getAccessToken()],
                'json' => ['query' => GraphQLHelper::authenticatedUserQuery()]
            ]);

        } catch (\Exception $e) {
            return [];
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return boolean
     */
    public function isAuthenticated(): bool
    {
        return isset($this->getAuthenticatedUser()['data']['authenticatedUser']['id']);
    }
    
    /**
     * @param Config $config
     * @return void
     */
    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }

    /**
     * @param string $accessToken
     * @return void
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param string $refreshToken
     * @return void
     */
    public function setRefreshToken(string $refreshToken): void
    {
        $this->accessToken = $refreshToken;
    }

    /**
     * @param string $idToken
     * @return void
     */
    public function setIdToken(string $idToken): void
    {
        $this->accessToken = $idToken;
    }

    public function fetchTokenByCode(string $code): array
    {
        try {
            $response = $this->client->post($this->config->getOidcTokenEndpoint(), [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => $this->getAuthorizationBasicToken()
                ],
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => $this->config->getRedirectUri(),
                ]
            ]);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}