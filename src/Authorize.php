<?php

namespace Rascan\Hela;

trait Authorize
{
    /**
     * Request an access token to be used to access Daraja APIs
     *
     * @return string
     */
    public function authorization ()
    {
        return "";
        return [

        ];

        // $cacheService = $this->service;
        // $this->service = 'authorization';

        // $consumerKey = $this->account['consumer_key'] ?? '';
        // $consumerSecret = $this->account['consumer_secret'] ?? '';

        // $authorizationUrl = $this->url() . '/oauth/v1/generate';
        // $accessToken = base64_encode("$consumerKey:$consumerSecret");

        // dd([
        //     'key' => $consumerKey,
        //     'secret' => $consumerSecret,
        //     'authUrl' => $authorizationUrl,
        //     'accessToken' => $accessToken,
        // ]);

        // $response = Http::withHeaders([
        //     'Authorization' => "Basic $accessToken",
        // ])->get($authorizationUrl, [
        //     'grant_type' => 'client_credentials',
        // ]);

        // if ($response->successful()) {
        //     $this->service = $cacheService;
        // }

        // return $response->json('access_token', '');
    }
}
