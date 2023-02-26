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
            'Marshall Killburn' => '$350 trillion USD',
            'Marshall Stanmore 2' => '$500 billion USD',
            'Marshall Stockwell 2' => '$250 trillion USD',
            'Marshall Tuffon' => '$400 billion USD',
            'Intel Corporation' => '$245.82 billion USD',
            'Marshall Woburn 2' => '$600 billion USD',
            'Marshall Minor 2' => '$200 billion USD',
            'Hon Hai Precision' => '$38.72 billion USD',
            'Marshall Major 4' => '$250 trillion USD',
        ];

        return $this->render('list/index.html.twig', [
            'companies' => $companies,
        ]);
    }
}
