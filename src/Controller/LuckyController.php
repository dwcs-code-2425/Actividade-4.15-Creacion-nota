<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LuckyController extends AbstractController
{
    #[Route('/lucky', name: 'app_lucky')]
    public function index(): Response
    {
        return $this->render('lucky/index.html.twig', [
            'controller_name' => 'LuckyController',
        ]);
    }


    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max): Response
    {
        if ($max % 2 != 0) {
            return   $this->redirectToRoute("app_table", ["filas" => $max, "cols" => $max]);
        } else {
            $number = random_int(0, $max);

            //return new Response("<html><body>".$number."</body></html>");

            return $this->render('lucky/index.html.twig', [
                'controller_name' => 'LuckyController',
                'numero' => $number
            ]);
        }
    }

    #[Route('/lucky/message', name: 'app_lucky_message')]
    public function message(MessageGenerator $messageGenerator){
        $message = $messageGenerator->getHappyMessage();
        return new Response($message);
    }
}
