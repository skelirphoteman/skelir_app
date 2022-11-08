<?php


namespace App\Service\Trading\Order;


use App\Binance\Service\BinanceConnectionService;
use App\Entity\Trading\Order\Order;

class FormaterOrder
{
    public function __construct(
        private BinanceConnectionService $binanceConnectionService
    )
    {
    }


    public function format(
        Order $order
    ) : array
    {

         $price = $this->binanceConnectionService->getPrice($order->getCrypto());
        return [
            'crypto' => $order->getCrypto(),
            'buy' => $order->getBuy(),
            'current' => $price,
            'result' => $this->getPercent($order->getBuy(), $price)
        ];
    }

    private function getPercent(float $getBuy, ?float $price)
    {

        if($price == null )
            return 0;


        return (($price - $getBuy) / $getBuy) * 100;
    }
}