<?php

namespace App\Controller;

use App\Entity\Language;
use App\Entity\Project;
use App\Entity\User;
use App\Form\ProjectType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        $user = $this->getUser();

        $form = $this->createForm(ProjectType::class,$project );

        $form -> handleRequest($request);

        if($form->isSubmitted())
        {
            $project=$form->getData();
            #$project->setDefaultLang($request->get("default_lang"));
            //Partie de chargement du fichier

            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            //$file=$project->getFile();
            $fileName = $file->getClientOriginalName().'.'.$this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );
            $project->setFile($fileName);
            //
            if ($user!=null) {
                // check si on est pas Annonyme
                $project->setUserId($user->getId());
            }

            $langsList = $request->get("choised_lang");

            foreach ($langsList as $key=>$value)
            {
                $project->addLanguage($value);
            };
            //dump(Language::getValueByIndex($form->get('defaultLang')->getData()));
            dump($project);

            $menager->persist($project);
            $menager->flush();

            return $this->redirectToRoute('done_page');
        }

        return $this->render('project/project_create.html.twig', [
            'formP'=>$form->createView(), // On envoi la forme dans le twig
            'languages'=>Language::getAllLocales() //on attache toutes les langues a l'envoi
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @Route("/done", name="done_page")
     */
    public function created()
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
