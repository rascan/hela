<?php

namespace Rascan\Hela;

use Illuminate\Support\Facades\Http;

class MPesa
{
    public function __construct(protected array $configs){}

    /**
     * Request an access token to be used to access available APIs
     */
    public function authorize ()
    {
        $consumerKey = $this->configs['consumer_key'];
        $consumerSecret = $this->configs['consumer_secret'];

        $accessToken = base64_encode("$consumerKey:$consumerSecret");
        $authorizationUrl = $this->configs['base_url'] . "/oauth/v1/generate";

        $response = Http::withHeaders([
            'Authorization' => "Basic $accessToken",
        ])->get($authorizationUrl, [
            'grant_type' => 'client_credentials',
        ]);

        return $response->json('access_token');
    }

    /**
     * Send a request to available APIs
     */
    public function __call ($method, $args)
    {
        Http::mpesa();
        // $serviceName = "App\\Library\\Services\\$method";

        // return (new $serviceName($this->configs, $args[0]))->handle();
    }
}
