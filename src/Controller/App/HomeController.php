<?php


namespace App\Controller\App;


use App\Binance\Objects\Candlestick;
use App\Binance\Service\BinanceConnectionService;
use Binance\API;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="app_index")
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, BinanceConnectionService $binanceConnectionService)
    {
        return $this->render('app.html.twig');
    }

    /**
     * @Route("/api/candlesticks", name="api_candlestick")
     */
    public function getExchangeInformation(Request $request, BinanceConnectionService $binanceConnectionService)
    {
        $apiKey = "Xt1G63ief3w9uQCcZt1HNNZ7uckzur9GEj2Kvl2d04ChzzvhaSMYgDnuVHztTCxy";
        $scret  = "lvCb7AlTqeD54Wc5V4IGXMvQbZUbBz29O0o5oE2fOkbYgBvBRBaE1Q4vXBdW0Dku";

        $binanceConnectionService->initialize($apiKey, $scret);

        $datas  = $binanceConnectionService->getPairInformations("BTCUSDT", BinanceConnectionService::FIVE_MINUTES, '12');

        $response = [];

        /** @var Candlestick $data */
        foreach ($datas as $data){
            $response[] = [
                'open'  => $data->getOpenPrice(),
                'close' => $data->getClosePrice(),
            ];
        }
        return new JsonResponse($response);
    }

}