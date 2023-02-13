<?php

namespace App\Controller;

use App\Entity\Inscrire;
use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use App\Form\InscrireType;
use App\Repository\InscrireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;



#[Route('/inscrire')]
class InscrireController extends AbstractController
{
    #[Route('/', name: 'app_inscrire_index', methods: ['GET'])]
    public function index(SessionInterface $session, FormationRepository  $FormationRepository): Response
    {
      $panier = $session->get("panier", []);

      // fabrication de donée

      $dataPanier = [];
      $total = 0;

      foreach($panier as $id => $quantite  ){

            $formation = $FormationRepository->find($id);
            $dataPanier = [
                "formation" => $formation,
                "quantité" => $quantite
            ];

            $total += $formation->getPrix() * $quantite;
      }
      return $this->render('inscrire/index.html.twig', compact("dataPanier", "total"));
    }

    #[Route('/new', name: 'app_inscrire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InscrireRepository $inscrireRepository): Response
    {
        $inscrire = new Inscrire();
        $form = $this->createForm(InscrireType::class, $inscrire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscrireRepository->add($inscrire);
            return $this->redirectToRoute('app_inscrire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inscrire/new.html.twig', [
            'inscrire' => $inscrire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inscrire_show', methods: ['GET'])]
    public function show(Inscrire $inscrire): Response
    {
        return $this->render('inscrire/show.html.twig', [
            'inscrire' => $inscrire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_inscrire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Inscrire $inscrire, InscrireRepository $inscrireRepository): Response
    {
        $form = $this->createForm(InscrireType::class, $inscrire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscrireRepository->add($inscrire);
            return $this->redirectToRoute('app_inscrire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inscrire/edit.html.twig', [
            'inscrire' => $inscrire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inscrire_delete', methods: ['POST'])]
    public function delete(Request $request, Inscrire $inscrire, InscrireRepository $inscrireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inscrire->getId(), $request->request->get('_token'))) {
            $inscrireRepository->remove($inscrire);
        }

        return $this->redirectToRoute('app_inscrire_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/add/{id}', name: 'app_inscrire_add', methods: ['GET'])]
    public function add(Formation $formation, SessionInterface $session)
  {
   // je récupère le panier
    $id = $formation->getId();
   $panier = $session->get("panier", []);

   if(!empty($panier[$id])){
    $panier[$id]++;
   }else{
    $panier[$id] = 1;
   }

   // sauvegarder session
   $session->set("panier", $panier);

   return $this->redirectToRoute("app_inscrire_index");


  }

}
