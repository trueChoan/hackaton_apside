<?php

namespace App\Controller;

use DateTime;
use App\Entity\Project;
use App\Entity\Ressource;
use App\Form\ProjectType;
use Symfony\Component\Mime\Email;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/project')]
class ProjectController extends AbstractController
{
    #[Route('/', name: 'app_project_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProjectRepository $projectRepository, MailerInterface $mailer): Response
    {

        $project= new Project();
        // $ressources = [
        //     $ressource1,
        //     $ressource2,
        //     $ressource3,
        // ];
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

    
        
        if ($form->isSubmitted() && $form->isValid()) {
            for ($i = 0; $i < 3; $i++) {
                $ressource = new Ressource();
                $ressource->setName('Ressource');
                $ressource->setLink($form->get('ressource_' . $i)->getData());
                $ressource->setProject($project);
                $project->addRessource($ressource);
            }
            $project->setCreatedAt(new DateTime());
            $projectRepository->add($project, true);

            $email = (new Email())
                ->from('admin@apside.com')
                ->to('johan.ala@example.com')
                ->subject('Nouveau projet chez Apside' . $project->getAgency()['name'])
                ->html($this->renderView('layoutEmail.html.twig', [
                    'project' => $project
                ]));

            $mailer->send($email);
            return $this->redirect('http://localhost:8000/app');
        }

        return $this->renderForm('project/new.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->add($project, true);

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project/edit.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project_delete', methods: ['POST'])]
    public function delete(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->request->get('_token'))) {
            $projectRepository->remove($project, true);
        }

        return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
    }
}
