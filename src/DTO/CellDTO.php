<?php

namespace App\DTO;

use PhpOffice\PhpSpreadsheet\Cell\Cell;

class CellDTO
{
    private array $cell;

    public function __construct(array $cell)
    {
        $this->cell = $cell;
    }

    public function getVin(): ?string
    {
        return $this->cell['W'];
    }

    public function getAgency(): ?string
    {
        return $this->cell['A'];
    }

    public function getRefMaker(): ?string
    {
        return $this->cell['T'];
    }

    public function getRefModel(): ?string
    {
        return $this->cell['U'];
    }

    public function getCity(): ?string
    {
        return $this->cell['L'];
    }
}