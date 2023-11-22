<?php
namespace Rascan\Hela;

use Illuminate\Support\Facades\Http;

trait AuthorizesRequests
{
    /**
     * Request an access token to be used to access Daraja APIs
     *
     * @return string
     */
    public function authorize () : string
    {
        return cache()->remember('hela_token', now()->addSeconds(3550), function () {
            $key = $this->accoun['consumer_key'];
            $secret = $this->accoun['consumer_secret'];
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
