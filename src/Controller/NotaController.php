<?php

namespace App\Controller;

use App\Entity\Nota;
use App\Service\NotaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotaController extends AbstractController
{
    #[Route('/nota/new', name: 'app_nota')]
    public function crear(EntityManagerInterface $entityManagerInterface): Response
    {
        $nota = new Nota();
        $nota->setTitulo("Mi primera nota");
        $nota->setDescripcion("Describiendo...");

        $entityManagerInterface->persist($nota);
        $entityManagerInterface->flush();


        return $this->render('nota/index.html.twig', [
            'controller_name' => 'NotaController',
            'idNota' => $nota->getId()
        ]);
    }


    #[Route('/notab/new', name: 'app_nota_servicio')]
    public function crearConServicio(NotaService $notaService): Response
    {
        $nota = new Nota();
        $nota->setTitulo("Mi primera nota");
        $nota->setDescripcion("Describiendo...");

        $notaService->crearNota($nota);

        $this->addFlash("info", "La nota se ha creado con éxito");

        return $this->render('nota/index.html.twig', [
            'controller_name' => 'NotaController',
            'idNota' => $nota->getId()
        ]);
    }

    #[Route('/nota', name: 'app_nota_list')]
    public function list(NotaService $notaService): Response
    {


        $notas = $notaService->findAll();

        return $this->render('nota/list.html.twig', [
            
            'notas' => $notas
        ]);
    }


}
