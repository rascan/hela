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
            $consumerKey = $this->account['consumer_key'] ?? '';
            $consumerSecret = $this->account['consumer_secret'] ?? '';

            $authorizationUrl = $this->baseUrl() . '/oauth/v1/generate';
            $accessToken = base64_encode("$consumerKey:$consumerSecret");

            $response = Http::withHeaders([
                'Authorization' => "Basic $accessToken",
                'service' => 'Authorization',
            ])->get($authorizationUrl, [
                'grant_type' => 'client_credentials',
            ]);

            abort_if($response->failed(), 401, $response->json('errorMessage', $response->getReasonPhrase()));

            return $response->json('access_token');
        });
    }
}
