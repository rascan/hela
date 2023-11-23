<?php

namespace Rascan\Hela;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Rascan\Hela\Services\Service;

class Hela
{
    use AuthorizesRequests;

    /**
     * The test/sandbox base url for daraja services.
     *
     * @var array
     */
    public const TEST_BASE_URL = 'https://sandbox.safaricom.co.ke';

    /**
     * The live/production base url for daraja services.
     *
     * @var array
     */
    public const LIVE_BASE_URL = 'https://api.safaricom.co.ke';

    /**
     * The app configs being used to call Daraja APIs
     *
     * @var array
     */
    protected $app = [];

    /**
     * Create a new hela instance.
     *
     * @param  array  $configs
     * @return void
     */
    public function __construct()
    {
        $this->app(config('hela.default'));
    }

    /**
     * Sets the active MPesa app for subsequent requests
     *
     * @param  string  $app
     *
     * @return self
     */
    public function app (string $app)
    {
        $this->app = Arr::get(config('hela.apps'), $app);

        return $this;
    }

    /**
     * Returns the base URL for accessing Daraja services
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function baseUrl ()
    {
        $environment = Arr::get($this->app, 'environment');

        if (!in_array($environment, ['test', 'live'])) {
            throw new \InvalidArgumentException("Environment [$environment] is invalid. Available options: 'test', 'live'");
        }

        return $environment === 'live' ?  self::LIVE_BASE_URL : self::TEST_BASE_URL;
    }

    /**
     * Send a request to available APIs
     */
    public function __call ($name, $args)
    {
        $data = array_merge($this->app, $args[0]);

        $service = HelaService::service($name, $data);

        $response = Http::mpesa($service->name())
            ->post($service->endpoint(), $service->payload());

        return $response->json();
    }
}
