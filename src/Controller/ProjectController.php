<?php

namespace App\Controller;

use App\Entity\Language;
use App\Entity\Project;
use App\Entity\Source;
use App\Entity\User;
use App\Form\ProjectType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
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
        if($user == null)
            return;

        $form = $this->createForm(ProjectType::class,$project);

        $form -> handleRequest($request);

        if($form->isSubmitted())
        {
            $project=$form->getData();
            #$project->setDefaultLang($request->get("default_lang"));
            //Partie de chargement du fichier

           // /** @var UploadedFile $file */
           // $file = $form->get('file')->getData();
            //$file=$project->getFile();
            //$fileName = $file->getClientOriginalName().'.'.$this->generateUniqueFileName().'.'.$file->guessExtension();
            /*$file->move(
                $this->getParameter('files_directory'),
                $fileName
            );

            $src = new Source();
            $src->setFile($fileName);

            $project->addSource($src);
            $src->setProject($project);*/
            $project->setOwner($user);
            $langsList = $request->get("choised_lang");

            foreach ($langsList as $key=>$value)
            {
                $project->addLanguage($value);
            };
            //dump(Language::getValueByIndex($form->get('defaultLang')->getData()));
            $user->addProject($project);
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
     * @Route("/project/{slug}", name="show_project_page")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProject($slug, RequestStack $requestStack)
    {
        $user = $this->getUser();
        if($user == null)
            return null;

        $project = $user->getProjectByName($slug);

        if($project == null)
            return null;

        $request = $requestStack->getCurrentRequest();
        if ($request->request->has('lang_src_list'))
        {
            $choised_lang = $request->get("lang_src_list");
            return $this->redirectToRoute('show_sources',['project_id'=>$project->getId(),'choised_lang'=>$choised_lang]);
        }


        return $this->render('project/show_project.html.twig', [
            'controller_name' => 'ProjectController',
            'project_name' =>$project->getName(),
            'languages'=>$project->getLanguages(),
            'ico_array'=>$this->renderIcons($project->getLanguages())
        ]);
    }


    public function renderIcons($ico_langs)
    {
        $adaptedArray = array();
        foreach ($ico_langs as $lang)
        {
            $index = strtolower(substr($lang,strlen($lang)-2,strlen($lang)));
            $fullname = Language::getValueByKey($lang);
            $adaptedArray[$index] = array($lang , $fullname);
        }
        return $adaptedArray;
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
