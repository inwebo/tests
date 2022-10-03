<?php

namespace App\Service;

use App\DTO\CellDTO;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelParser
{
    private Spreadsheet $spreadsheet;

    public function setFilename(string $filename): void
    {
        $this->spreadsheet = IOFactory::load($filename);
    }

    public function getDtoArray(): array
    {
        $data = [];

        foreach ($this->spreadsheet->getWorksheetIterator() as $worksheet) {
            foreach ($worksheet->getRowIterator() as $row) {
                $rowIndex     = $row->getRowIndex();
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                //foreach ($cellIterator as $cell) {
                    if ($rowIndex > 1) {
                        $dto    = new CellDTO(iterator_to_array($cellIterator));
                        $data[] = $dto;
                        // dd($dto->getAgency(), $dto->getVin(), $dto->getCity(), $dto->getRefMaker(), $dto->getRefModel());
                    }
                //}
            }
        }

        return $data;
    }
}