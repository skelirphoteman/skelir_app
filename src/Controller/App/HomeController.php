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
        return $this->render('app.html.twig', [
            'vueComponent'  => 'Index'
        ]);
    }

    /**
     * @Route("/api/candlesticks", name="api_candlestick")
     */
    public function getExchangeInformation(Request $request, BinanceConnectionService $binanceConnectionService)
    {
        $datas  = $binanceConnectionService->getPairInformations("BTCUSDT", '1w', '12');

        $response = [];

        /** @var Candlestick $data */
        foreach ($datas as $data){
            $response[] = [
                'startAt'  => $data->getOpenTime()->format('d-m-Y'),
                'open'      => $data->getOpenPrice(),
                'close'     => $data->getClosePrice(),
            ];
        }
        return new JsonResponse($response);
    }

}