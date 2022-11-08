<?php


namespace App\Binance\Service;


use App\Binance\Objects\Candlestick;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BinanceConnectionService
{

    CONST URL                   = "https://api.binance.com";

    // TimeFrame
    CONST ONE_MINUTE            = "1m";
    CONST FIVE_MINUTES          = "5m";


    /**
     * @var string $apiKey
     */
    private $apiKey;


    /**
     * @var string $secretKey
     */
    private $secretKey;


    /**
     * Ò@var HttpClientInterface
     */
    private $client;

    public function __construct(
        HttpClientInterface $client
    )
    {
        $this->client = $client;
    }


    public function initialize(
        string $apiKey,
        string $secretKey
    )
    {
        $this->apiKey       = $apiKey;
        $this->secretKey    = $secretKey;
    }


    public function getExchangeInformations() : string
    {

        $response = $this->client->request(
            'GET',
            BinanceConnectionService::URL . '/api/v3/exchangeInfo'
        );

        $symbols = [];
        foreach (($response->toArray())['symbols'] as $item){
            $symbols[]   = $item['symbol'];
        }
        dd($symbols);
        return $response->toArray();
    }

    public function getPairInformations(
        string  $symbol,
        string  $interval,
        int     $limit
    )
    {
        $response = $this->client->request(
            'GET',
            BinanceConnectionService::URL . '/api/v3/klines',
            [
                'query' => [
                    'symbol'    => $symbol,
                    'interval'  => $interval,
                    'limit'     => $limit,
                ]
            ]
        );

        $candlesticks   = [];

        foreach ($response->toArray() as $item)
        {
            $candlestick    = new Candlestick($item);
            $candlesticks[] = $candlestick;
        }

        return $candlesticks;
    }

    /**
     * @param string $pair
     */
    public function getPrice(
        string $pair
    ) : ?float
    {
        $response = $this->client->request(
            'GET',
            BinanceConnectionService::URL . '/api/v3/ticker/price?symbol=' . $pair,
        )->toArray();

        if(array_key_exists('price', $response)){
            return (float) $response['price'];
        }


        return null;
    }
}