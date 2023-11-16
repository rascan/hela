<?php

namespace Rascan\Hela;

use Illuminate\Queue\InvalidPayloadException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ItemNotFoundException;
use Rascan\Hela\Authorize;
use Rascan\Hela\Exceptions\InvalidConfig;

class MPesa
{
    use Authorize;

    const LIVE_BASE_URL = 'https://sandbox.safaricom.co.ke';
    const TEST_BASE_URL = 'https://api.safaricom.co.ke';

    protected $account;
    protected $service;

    public function __construct(protected array $configs)
    {
        $this->account();
    }

    /**
     * Sets the active MPesa account for subsequent requests
     *
     * @param  string  $account
     * @return self
     */
    public function account (string $defaultAccount = null) : self
    {
        $accountName = $defaultAccount ?: $this->configs['default'] ?? 'sandbox';

        $this->account = $this->configs['accounts'][$accountName] ?? null;

        if (is_null($this->account)) {
            throw new \InvalidArgumentException("MPesa account [$accountName] not configured.");
        }

        return $this;
    }

    /**
     * Returns the base URL for accessing Daraja services
     *
     * @return string
     */
    public function baseUrl () : string
    {
        $environment = $this->account['environment'] ?? 'test';

        if (!in_array($environment, ['test', 'live'])) {
            throw new \InvalidArgumentException("Environment [$environment] is invalid.");
        }

        return $environment === 'live' ? MPesa::LIVE_BASE_URL : MPesa::TEST_BASE_URL;
    }

    /**
     * Returns the Daraja API service that is being processed
     *
     * @return string
     */
    public function service () : string
    {
        return $this->service;
    }

    /**
     * Send a request to available APIs
     */
    public function __call ($service, $args)
    {
        // $this->service = $service;

        // $serviceName = "Rascan\\Hela\\Services\\$service";

        // (new $serviceName(array_merge($this->account, $args[0])))->handle();
    }
}
