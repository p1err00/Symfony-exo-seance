<?php

namespace App\Controller;

use App\Entity\OrganismeFormation;
use App\Form\OrganismeFormationType;
use App\Repository\OrganismeFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/organisme/formation")
 */
class OrganismeFormationController extends AbstractController
{
    /**
     * @Route("/", name="app_organisme_formation_index", methods={"GET"})
     */
    public function index(OrganismeFormationRepository $organismeFormationRepository): Response
    {
        return $this->render('organisme_formation/index.html.twig', [
            'organisme_formations' => $organismeFormationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_organisme_formation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OrganismeFormationRepository $organismeFormationRepository): Response
    {
        $organismeFormation = new OrganismeFormation();
        $form = $this->createForm(OrganismeFormationType::class, $organismeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $organismeFormationRepository->add($organismeFormation, true);

            return $this->redirectToRoute('app_organisme_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organisme_formation/new.html.twig', [
            'organisme_formation' => $organismeFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_organisme_formation_show", methods={"GET"})
     */
    public function show(OrganismeFormation $organismeFormation): Response
    {
        return $this->render('organisme_formation/show.html.twig', [
            'organisme_formation' => $organismeFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_organisme_formation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OrganismeFormation $organismeFormation, OrganismeFormationRepository $organismeFormationRepository): Response
    {
        $form = $this->createForm(OrganismeFormationType::class, $organismeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $organismeFormationRepository->add($organismeFormation, true);

            return $this->redirectToRoute('app_organisme_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('organisme_formation/edit.html.twig', [
            'organisme_formation' => $organismeFormation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_organisme_formation_delete", methods={"POST"})
     */
    public function delete(Request $request, OrganismeFormation $organismeFormation, OrganismeFormationRepository $organismeFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organismeFormation->getId(), $request->request->get('_token'))) {
            $organismeFormationRepository->remove($organismeFormation, true);
        }

        return $this->redirectToRoute('app_organisme_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
