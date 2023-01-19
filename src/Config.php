<?php

namespace BaglanS\Doma;

class Config
{
    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @var string
     */
    protected $scope;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $domain = 'https://condo.d.doma.ai';

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUri
     */
    public function __construct(string $clientId, string $clientSecret, string $redirectUri)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    /**
     * @return string
     */
    public function getDefaultScope(): string
    {
        return 'openid profile email phone';
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope ?? $this->getDefaultScope();
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }
    
    /**
     * @return string
     */
    public function getOidcEndpoint(): string
    {
        return "$this->domain/oidc/";
    }

    /**
     * @return string
     */
    public function getApiEndpoint(): string
    {
        return "$this->domain/admin/api/";
    }

    /**
     * @return string
     */
    public function getOidcAuthEndpoint(): string
    {
        return $this->getOidcEndpoint() . 'auth';
    }

    /**
     * @return string
     */
    public function getOidcTokenEndpoint(): string
    {
        return $this->getOidcEndpoint() . 'token';
    }

    /**
     * @param string $clientId
     * @return void
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $clientSecret
     * @return void
     */
    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @param string $redirectUri
     * @return void
     */
    public function setRedirectUri(string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @param string $scope
     * @return void
     */
    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * @param string $state
     * @return void
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param string $domain
     * @return void
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }
}