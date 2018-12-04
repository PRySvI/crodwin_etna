<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project_create", name="project_create")
     */
    public function create()
    {

        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('name')
            ->add('user_id')
            ->add('languages')
            ->getForm();
        return $this->render('project/project_create.html.twig', [
            'formP'=>$form->createView()
        ]);
    }

}
