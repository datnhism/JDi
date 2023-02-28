<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(Request $request)
    {
        $companies = [
            'Marshall Killburn' => '$1 million USD',
            'Marshall Stanmore 2' => '$5 million USD',
            'Marshall Stockwell 2' => '$2 million USD',
            'Marshall Tuffon' => '$4 million USD',
            'Intel Corporation' => '$2 million USD',
            'Marshall Woburn 2' => '$6 million USD',
            'Marshall Minor 2' => '$2 million USD',
            'Hon Hai Precision' => '$3.72 million USD',
            'Marshall Major 4' => '$2.07 million USD',
        ];

        return $this->render('list/index.html.twig', [
            'companies' => $companies,
        ]);
    }
}
