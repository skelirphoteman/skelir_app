<?php


namespace App\Controller\CryptoCurrency;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/", "crypto_currency")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function listCryptoCurrency()
    {
        return $this->render('app.html.twig', [
            'vueComponent'  => 'CryptoCurrency'
        ]);
    }

}