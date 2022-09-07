<?php


namespace App\Controller\CryptoCurrency;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/crypto-currency")
 *
 * Class CryptoCurrencyController
 * @package App\Controller\CryptoCurrency
 */
class CryptoCurrencyController extends AbstractController
{
    /**
     * @Route("/", "crypto_currency", methods={"GET"})
     * @return Response
     *
     */
    public function indexCryptoCurrency()
    {
        return $this->render('app.html.twig', [
            'vueComponent'  => 'CryptoCurrency'
        ]);
    }

    /**
     * @Route("/list", "crypto_currency_list", methods={"GET"})
     * @return JsonResponse
     */
    public function listCryptoCurrency()
    {

        return new JsonResponse([
            "UTC/BTC"   => 'TEST'
        ]);
    }

}