<?php

declare(strict_types=1);

namespace App\Controller;

use App\Adapter\Connection;
use App\Entity\Bet;
use App\Entity\Category;
use App\UploadFile\UploadFile;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;
use Dompdf\Dompdf;
use Dompdf\Options;

class BetController extends AbstractController
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;
    private ObjectRepository $categoryRepository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Bet::class);
        $this->categoryRepository = $this->entityManager->getRepository(Category::class);
    }

    public function listAction(): void
    {
        $this->render('bet/list', [
            'bets' => $this->repository->findAll(),
        ]);
    }

    public function addAction(): void
    {
        if (!$_POST) {
            $this->render('bet/add', [
                'categories' => $this->categoryRepository->findAll(),
            ]);
            return;
        }

        $category = $this->categoryRepository->find($_POST['category']);

         // 2021-04-22

        $bet = new Bet(
            $_POST['title'],
            $category,
            date_create_from_format('Y-m-d', $_POST['date'])
        );
        $bet->setDescription($_POST['description']);
        $bet->setPhoto(
            UploadFile::uploadPhoto($_FILES['image'])
        );
        $bet->setFee((float) $_POST['fee']);
        $bet->setValue((float) $_POST['value']);

        $this->entityManager->persist($bet);
        $this->entityManager->flush();

        header('location: /aposta/listar');
    }

    public function editAction(): void
    {
        $bet = $this->repository->find($_GET['id']);

        if (!$_POST) {
            $this->render('bet/edit', [
                'bet' => $bet,
                'categories' => $this->categoryRepository->findAll(),
            ]);

            return;
        }

        if ($_POST['category'] !== $bet->getCategory()->getId()) {
            $category = $this->categoryRepository->find($_POST['category']);
            $bet->setCategory($category);
        }

        $bet->setDescription($_POST['description']);
        $bet->setTitle($_POST['title']);
        $bet->setValue((float) $_POST['value']);
        $bet->setFee((float) $_POST['fee']);
        $bet->setDate(date_create_from_format('Y-m-d', $_POST['date']));

        $this->entityManager->persist($bet);
        $this->entityManager->flush();

        header('location: /aposta/listar');
    }

    public function removeAction(): void
    {
        $id = $_GET['id'];
        $bet = $this->repository->find($id);

        $this->entityManager->remove($bet);
        $this->entityManager->flush();

        header('location: /aposta/listar');
    }

    public function pdfAction(): void
    {
        $template = $this->renderToPdf('bet/pdf', [
            'bets' => $this->repository->findAll(),
        ]);

        $options = new Options();
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($template);
        $dompdf->setOptions($options);
        $dompdf->render();
        $dompdf->stream('Relatorio-apostas.pdf', [
            'Attachment' => false,
        ]);
    }
}