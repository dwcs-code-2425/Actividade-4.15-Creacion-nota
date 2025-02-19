<?php
namespace App\Service;

use App\Entity\Nota;
use App\Repository\NotaRepository;
use Doctrine\ORM\EntityManagerInterface;

class NotaService{
    public function __construct(private EntityManagerInterface $entityManagerInterface, 
    private NotaRepository $notaRepository) {
        
    }

    public function crearNota(Nota $nota){
        $this->entityManagerInterface->persist($nota);
        $this->entityManagerInterface->flush();
    }

    public function findAll(){
        return $this->notaRepository->findAll();
    }


    

}