<?php

namespace App\Controller;

use App\Form\ImportType;
use App\Service\DtoManager;
use App\Service\ExcelParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    private ExcelParser $excelParser;
    private DtoManager $dtoManager;

    public function __construct(ExcelParser $excelParser, DtoManager $dtoManager)
    {
        $this->excelParser = $excelParser;
        $this->dtoManager = $dtoManager;
    }

    public function index(Request $request, string $filename = '', array $dtos = []): Response
    {
        $form = $this->createForm(ImportType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filename = $form->get('excel')->getData();
            $this->excelParser->setFilename($filename);
            $dtos = $this->excelParser->getDtoArray();

            foreach ($dtos as $dto) {
                $this->dtoManager->persistOrUpdate($dto);
            }
        }

        return $this->render('index/index.html.twig', [
            'form'     => $form->createView(),
            'filename' => $filename,
            'dtos'     => $dtos,
        ]);
    }
}
