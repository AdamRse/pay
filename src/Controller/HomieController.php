<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomieController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order->setStatus("WAITING");
            $order->setPaymentMethod("CB");
            // $order->setClient($form->get("client"));
            // $order->setBiling($form->get("biling"));
            // $order->setShipping($form->get("shipping"));
            //$form->all()[cart][cart_products][0]
            //$order->setProduct();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('app_order_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('landing_page/index_new.html.twig', [
            "form" => $form
        ]);
    }
    
    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(Request $request, EntityManagerInterface $em): Response
    {
        
        $token = $this->getParameter('apitoken');
        return $this->render('landing_page/confirmation.html.twig');
    }
}