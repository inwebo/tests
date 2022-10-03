<?php

namespace App\Service;

use App\DTO\CellDTO;
use Doctrine\ORM\EntityManagerInterface;

class DtoManager
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function persistOrUpdate(CellDTO $dto): void
    {
        // Persist or Update avec Doctrine c'est trivial
        $this->em;
    }
}