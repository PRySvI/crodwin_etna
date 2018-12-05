<?php

namespace App\Controller;

use App\Entity\Language;
use App\Entity\Project;
use App\Form\ProjectType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project_create", name="project_create")
     * @param Request $request
     * @param ObjectManager $menager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request, ObjectManager $menager)
    {

        $project = new Project();

        $form = $this->createForm(ProjectType::class,$project);

        $form -> handleRequest($request);

        if($form->isSubmitted())
        {
            $project=$form->getData();
            $def_lang = $request->get("default_lang");
            $langs = $request->get("choised_lang");

            //$project->setLanguages($langs)
            dump($project);
            dump($def_lang);
            dump($langs);
            $langs = $request->get("choised_lang");
            dump($langs);
            /*$def_l = $form['def_l']->getData();
            $ms = $form['ms']->getData();
            dump("def_l ".def_l);
            dump("ms ".ms);
            $project->setDefaultLang();
            $menager->persist($project);
            $menager->flush();*/
            //return $this->redirectToRoute('security_login');
        }

        return $this->render('project/project_create.html.twig', [
            'formP'=>$form->createView(), // On envoi la forme dans le twig
            'languages'=>Language::getAllLocales() //on attache toutes les langues a l'envoi
        ]);
    }

}
