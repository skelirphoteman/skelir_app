<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class SkelirAbstractController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }


    protected function renderVue(
        string  $component,
        array   $datas
    ){
        return $this->render('app.html.twig', [
            'vueComponent'  => $component,
            'datas'         => $datas,
        ]);
    }
}