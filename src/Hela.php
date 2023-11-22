<?php

namespace Rascan\Hela;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Rascan\Hela\Services\Service;

class Hela
{
    use AuthorizesRequests,
        ConstructService;

    /**
     * The account configs being used to call Daraja APIs
     *
     * @var array
     */
    protected $account = [];

    /**
     * The service (Daraja API) that is currently being called
     *
     * @var Service
     */
    protected Service $service;

    /**
     * Create a new hela instance.
     *
     * @param  array  $configs
     * @return void
     */
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
    public function account (string $account = null) : self
    {
        $accountName = $account ?: $this->configs['default'] ?? 'sandbox';
        $this->account = $this->configs['accounts'][$accountName] ?? null;

        dd($this->account);

        // validator($this->account, [
        //     'consumer_key' => [
        //         'required'
        //     ],
        // ])->validate();

        // if (is_null($this->account)) {
        //     throw new \InvalidArgumentException("MPesa account [$accountName] not configured.");
        // }

        // if (!isset($this->account['consumer_key']) or !$this->account['consumer_key']) {
        //     throw new \ErrorException("The consumer key is not provided.");
        // }

        // if (!isset($this->account['consumer_secret']) or !$this->account['consumer_secret']) {
        //     throw new \ErrorException("The consumer secret is not provided.");
        // }

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

        return $environment === 'live' ?  ConstantManager::LIVE_BASE_URL : ConstantManager::TEST_BASE_URL;
    }

    /**
     * Send a request to available APIs
     */
    public function __call ($name, $args)
    {
        $data = array_merge($this->account, $args[0]);

        $this->service = $this->service($name, $data);

        $response = Http::mpesa($name)->post($this->service->endpoint(), $this->service->payload());

        return $response->json();
    }
}
