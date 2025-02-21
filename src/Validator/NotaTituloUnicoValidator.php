<?php

namespace App\Validator;

use App\Repository\NotaRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class NotaTituloUnicoValidator extends ConstraintValidator
{

    public function __construct(private NotaRepository $notaRepository) {}

    public function validate(mixed $nota, Constraint $constraint): void
    {
        /* @var NotaTituloUnico $constraint */
        $titulo = $nota->getTitulo();

        if (null === $titulo || '' === $titulo) {
            return;
        }

        // TODO: implement the validation here
        $notaConIgualTitulo = $this->notaRepository->findOneBy(["titulo" => $titulo]);
        if ($notaConIgualTitulo != null && $nota->getId() != $notaConIgualTitulo->getId()) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $titulo)
                ->addViolation()
            ;
        }
    }
}
