<?php
namespace Rascan\Hela;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait AuthorizesRequests
{
    /**
     * The time (in seconds) that the token is cached
     *
     * @var int
     */
    protected const TIME_TO_LIVE = 3590;

    /**
     * Request an access token to be used to access Daraja APIs
     *
     * @return string
     */
    public function authorize () : string
    {
        $ttl = now()->addSeconds(self::TIME_TO_LIVE);

        return Cache::remember('hela_token', $ttl, function () {
            $key = Arr::get($this->app, 'consumer_key');
            $secret = Arr::get($this->app, 'consumer_secret');

            $accessToken = base64_encode("$key:$secret");

            $response = Http::baseUrl($this->baseUrl())
                ->withHeaders([
                    'Authorization' => "Basic $accessToken",
                    'service' => 'authorization',
                ])->get('/oauth/v1/generate', [
                    'grant_type' => 'client_credentials',
                ]);

            abort_if($response->failed(), 401, $response->json('errorMessage', $response->getReasonPhrase()));

            return $response->json('access_token');
        });
    }
}
