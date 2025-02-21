<?php

namespace App\Entity;

use App\Repository\NotaRepository;
use App\Validator\NotaTituloUnico;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;


#[ORM\Entity(repositoryClass: NotaRepository::class)]
#[NotaTituloUnico]
class Nota
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[NotBlank(message: 'El campo titulo no debería estar vacío')]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    #[NotBlank(message: 'El campo descripción no debería estar vacío')]
    private ?string $descripcion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
