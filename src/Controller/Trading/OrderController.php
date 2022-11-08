<?php


namespace App\Controller\Trading;


use App\Controller\SkelirAbstractController;
use App\Entity\Trading\Order\Order;
use App\Form\Trading\Order\CreateOrderType;
use App\Service\Trading\Order\FormaterOrder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/order')]
class OrderController extends SkelirAbstractController
{


    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/create', name: "order_create")]
    public function createOrder(
        Request $request,
    )
    {

        $order  = new Order();
        $form   = $this->createForm(CreateOrderType::class, $order);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){


            $this->entityManager->persist($order);
            $this->entityManager->flush();

            return $this->redirectToRoute("order_list");
        }

        return $this->render('twig/trading/order/create.html.twig', [
            'form' => $form->createView()
        ]);


        /**return $this->renderVue('Test/Create', [
        'bonjours'   => 'bonjours',
        'dazda'     => [0, 1, 0],
        ]);*/
    }

    #[Route('/list', name: "order_list")]
    public function listOrder(
        Request $request,
        FormaterOrder $formater
    ){
        $orders = $this->entityManager->getRepository(Order::class)->findAll();

        $rows = [];
        foreach ($orders as $order){
            $rows[] = $formater->format($order);
        }

        return $this->render('twig/trading/order/list.html.twig', [
            'rows' => $rows
        ]);
    }
}