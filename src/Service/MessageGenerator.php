<?php
// src/Service/MessageGenerator.php
namespace App\Service;

use Psr\Log\LoggerInterface;

class MessageGenerator
{
public function __construct(private LoggerInterface $logger) {
        $this->logger->info("Se ha creado un objeto de " . __CLASS__);
}
    public function getHappyMessage(): string
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}