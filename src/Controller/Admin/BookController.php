<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/book')]
final class BookController extends AbstractController
{
    #[Route('/new', name: 'app_admin_book')]
    public function new(Request $request): Response
    {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //logic here
        }

        return $this->render('admin/book/new.html.twig', [
            'controller_name' => 'BookController',
            'form' => $form
        ]);
    }
}
