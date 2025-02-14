<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TableController extends AbstractController
{

    const MIN_VALUE = 0;
    const MAX_VALUE = 100;
    #[Route('/table/{filas<[1-9]\d*>}/{cols<[1-9]\d*>}', name: 'app_table')]
    public function index(int $filas=4, int $cols=4): Response
    {
        for ($i = 0; $i < $filas; $i++){
            for ($j=0; $j <$cols ; $j++) {
                $array[$i][$j] = random_int(self::MIN_VALUE, self::MAX_VALUE);
            }
        }

        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'filas' => $filas,
            'cols' => $cols,
            'array' => $array
        ]);
    }
}
