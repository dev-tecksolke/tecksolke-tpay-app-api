<?php

namespace TPay\API\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TpayController extends Controller {
    /**
     * @var Client
     */
    private $client;
    private $accessToken;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
        $this->client = new Client([
            'base_uri' => config('tpay.end_point_url'),
            'timeout' => config('tpay.timeout'),
            'connect_timeout' => config('tpay.connect_timeout'),
        ]);
        $this->accessToken;
    }

    /**
     * ----------------------------
     * get access token
     * ----------------------------
     * @return Exception
     * @throws Exception
     */
    public function getAccessToken() {
        // Set the request options
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(config('tpay.pusher_app_key') . ':' . config('tpay.app_key')),
            ],
        ];

        $response = json_decode($this->processRequest('api/t-pay/v1/oauth/access-token', $options, 'GET'));

        try {
            if ($response->data->success) {
                $this->accessToken = $response->data->accessToken;
                return $this->accessToken;
            }
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * -----------------------------------------------------------------
     * cache the access token here
     * This cache is important allows the token to be used
     * to avoid request for new access token before session expired
     * @return mixed
     * -----------------------------------------------------------------
     */
    public function cacheAccessToken() {
        return Cache::remember('t-pay-access-token', now()->addMinutes(config('tpay.token_session')), function () {
            return $this->getAccessToken();
        });
    }


    /**
     * -----------------------------------
     * set request options headers
     * @param array $data
     * @return array
     * @throws Exception
     * ----------------------------------
     */
    public function setRequestOptions(array $data) {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->cacheAccessToken(),
            ],
            'json' => $data,
        ];
    }

    /**
     * -------------------------------------------------
     * request the balance here
     * @return Exception|GuzzleException|string
     * @throws Exception
     * -------------------------------------------------
     */
    public function getAppBalance() {
        $data = [
            'app_key' => config('tpay.app_key'),
        ];

        //send the request
        $response = json_decode((new TpayController())->processRequest('api/t-pay/v1/oauth/app-balance', (new TpayController())->setRequestOptions($data), 'GET'));

        /**
         * extract the ap
         * balance from here
         */
        try {
            if ($response->data->success)
                return $response->data->balance;
            return 0;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

    }


    /**
     * function process request
     * from tpay/payment gateway
     * process get request
     * @param string $url
     * @param array $options
     * @param string $method
     * @return Exception|GuzzleException|string
     */
    public function processRequest(string $url, array $options, $method = "POST") {
        try {
            $response = (new TpayController())->client->request($method, $url, $options);

            return ($response->getBody()->getContents());
        } catch (ClientException $clientException) {
            $exception = $clientException->getResponse()->getBody()->getContents();
            Log::critical('client-exception' . $clientException->getMessage());
            return $exception;
        } catch (ServerException $serverException) {
            $exception = $serverException->getResponse()->getBody()->getContents();
            Log::critical('server-exception' . $serverException->getMessage());
            return $exception;
        } catch (GuzzleException $e) {
            Log::critical($e->getMessage());
            return $e->getMessage();
        }
    }
}
