<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\Type\CategoryFormType;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

// class CategoryController extends AbstractController
// {
//     /**
//      * @Route("/category", name="app_category")
//      */
//     public function showCategoryAction(CategoryRepository $repo): Response
//     {
//         $category = $repo->findAll();
//         return $this->render('Category/index.html.twig',[
//             'category'=> $category
//         ]);
//     }
//     /**
//      * @Route("/category/add", name="addCategory")
//      */
//     public function addCategoryAction(ManagerRegistry $res, Request $req, ValidatorInterface $valid): Response
//     {
//         $category = new Category();
//         $categoryForm = $this->createForm(CategoryFormType::class, $category);
//         $categoryForm ->handleRequest($req);
//         $entity = $res->getManager();
//         if($categoryForm->isSubmitted() && $categoryForm->isValid())
//         {
//             $data = $categoryForm->getData();
//             $category->setCatName($data->getCatName());
//             $category->setCatDes($data->getCatDes());
 
//             $err = $valid->validate($category);
//             if (count($err) > 0) {
//                 $string_err = (string)$err;
//                 return new Response($string_err, 400);
//             }
//             $entity->persist($category);
//             $entity->flush();
 
//             $this->addFlash(
//                 'success',
//                 'Your post was added'
//             );
//             return $this->redirectToRoute("app_category");
//         }
//         return $this->render('category/add.html.twig', [
//             'form' => $categoryForm->createView()
//         ]);
//     }
//     /**
//      * @Route("/edit/Category/{id}", name="editCategory")
//      */
//     public function editCategoryAction(ManagerRegistry $res, Request $req, ValidatorInterface $valid, CategoryRepository $repo, $id): Response
//     {
//         $category = $repo->find($id);
//         $categoryForm = $this->createForm(CategoryFormType::class, $category);
//         $categoryForm ->handleRequest($req);
//         $entity = $res->getManager();
//         if($categoryForm->isSubmitted() && $categoryForm->isValid())
//         {
//             $data = $categoryForm->getData();
//             $category->setCatName($data->getCatName());
//             $category->setCatDes($data->getCatDes());
//             $err = $valid->validate($category);
//             if (count($err) > 0) {
//                 $string_err = (string)$err;
//                 return new Response($string_err, 400);
//             }
//             $entity->persist($category);
//             $entity->flush();
 
//             $this->addFlash(
//                 'success',
//                 'Your post was added'
//             );
//             return $this->redirectToRoute("app_category");
//         }
//         return $this->render('category/add.html.twig', [
//             'form' => $categoryForm->createView()
//         ]);
//     }
//     /**
//      * @Route("/delete/Category{id}", name="delateCategory")
//      */
//     public function FunctionName(): Response
//     {
//         $category = $repo->find($id);
 
//         if (!$category) {
//             throw
//             $this->createNotFoundException('Invalid ID ' . $id);
//         }
//         $entity = $doc->getManager();
//         $entity->remove($category);
//         $entity->flush();
//         return $this->redirectToRoute("app_category");
//     }
    
// }


/**
 * @Route("/admin_cat/category")
 */

 class CategoryController extends AbstractController
 {
     private CategoryRepository $repo;
     public function __construct(CategoryRepository $repo)
     {
         $this->repo = $repo;
     }
     /**
      * @Route("/admin1", name="category_show")
      */
     public function readAllAction(): Response
     {
         $category = $this->repo->findAll();
         return $this->render('category/index.html.twig', [
             'category' => $category
         ]);
     }
 
     /**
      * @Route("/{id}", name="category_read",requirements={"id"="\d+"})
      */
     public function showAction(Category $c): Response
     {
         return $this->render('detail.html.twig', [
             'c' => $c
         ]);
     }
 
     /**
      * @Route("/add1", name="category_create")
      */
     public function createAction(Request $req, SluggerInterface $slugger): Response
     {
 
         $c = new Category();
         $form = $this->createForm(CategoryType::class, $c);
 
        //  $form->handleRequest($req);
        //  if ($form->isSubmitted() && $form->isValid()) {
        //      if ($c->getCreated() === null) {
        //          $c->setCreated(new \DateTime());
        //      }
        //      $imgFile = $form->get('file')->getData();
        //      if ($imgFile) {
        //          $newFilename = $this->uploadImage($imgFile, $slugger);
        //          $p->setImage($newFilename);
        //      }
        //      $this->repo->save($c, true);
        //      return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
        //  }
         return $this->render("category/form.html.twig", [
             'form' => $form->createView()
         ]);
     }
 
    //  /**
    //   * @Route("/edit/{id}", name="category_edit",requirements={"id"="\d+"})
    //   */
    //  public function editAction(
    //      Request $req,
    //      Category $c,
    //      SluggerInterface $slugger
    //  ): Response {
 
    //      $form = $this->createForm(CategoryType::class, $c);
 
    //      $form->handleRequest($req);
    //      if ($form->isSubmitted() && $form->isValid()) {
 
    //          if ($c->getCreated() === null) {
    //              $c->setCreated(new \DateTime());
    //          }
    //          $imgFile = $form->get('file')->getData();
    //          if ($imgFile) {
    //              $newFilename = $this->uploadImage($imgFile, $slugger);
    //              $c->setImage($newFilename);
    //          }
    //          $this->repo->save($c, true);
    //          return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
    //      }
    //      return $this->render("category/form.html.twig", [
    //          'form' => $form->createView()
    //      ]);
    //  }
 
    //  public function uploadImage($imgFile, SluggerInterface $slugger): ?string
    //  {
    //      $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
    //      $safeFilename = $slugger->slug($originalFilename);
    //      $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgFile->guessExtension();
    //      try {
    //          $imgFile->move(
    //              $this->getParameter('image_dir'),
    //              $newFilename
    //          );
    //      } catch (FileException $e) {
    //          echo $e;
    //      }
    //      return $newFilename;
    //  }
 
     /**
      * @Route("/delete/{id}",name="category_delete",requirements={"id"="\d+"})
      */
 
     public function deleteAction(Request $request, Category $c): Response
     {
         $this->repo->remove($c, true);
         return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
     }
 }
 ?>
