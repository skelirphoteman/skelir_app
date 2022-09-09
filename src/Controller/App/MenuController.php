<?php


namespace App\Controller\App;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/menu")
 *
 * @author Julien Galoin
 * Class MenuController
 * @package App\Controller\App
 */
class MenuController extends AbstractController
{
    /**
     * @Route("/home", name="menu_home")
     * @return Response
     */
    public function homeMenu() : Response
    {
        return $this->redirectToRoute('app_index');
    }

    /**
     * @Route("/crypto-currency", name="menu_crypto_currency")
     * @return Response
     */
    public function cryptoCurrencyMenu() : Response
    {
        return $this->redirectToRoute('crypto_currency');
    }
}