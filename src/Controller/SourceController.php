<?php

namespace App\Controller;

use App\Entity\Source;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SourceController extends AbstractController
{
    /**
     * @Route("/sources", name="show_sources")
     */
    public function showSourcesList(Request $request)
    {
        $user = $this->getUser();
        $choised_lang = $request->get('choised_lang');
        $project_id = $request->get('project_id');
        $choised_src = $request->get('choised_src');
        $project = $user->getProjectById($project_id);
        $src =$project->getSourcesNames();
        if(!is_null($choised_src))
        {
            return $this->redirectToRoute('modify_source_strings',['project_id'=>$project->getId(), 'choised_src'=>$choised_src,'choised_lang'=>$choised_lang]);
        }
        if(count($src)==0)
        {
            return $this->redirectToRoute('create_source',['project_id'=>$project->getId(),'choised_lang'=>$choised_lang]);
        }
        return $this->render('source/show_sources.html.twig', [
            'controller_name' => 'SourceController',
            'sources' => $src
        ]);
    }

    /**
     * @Route("/create_source", name="create_source")
     */
    public function create(Request $request, ObjectManager $menager)
    {
        $user = $this->getUser();
        $project = $user->getProjectById($request->get('project_id'));
        $source = new Source();
        $form = $this->createFormBuilder($source)
            ->add('file', FileType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );
            $source->setFile($fileName);
            $source->setName($file->getClientOriginalName());
            $source->setProject($project);
            $source->readStringsFromFile();
           $menager->persist($source);
           $menager->flush();
           return $this->redirectToRoute('show_sources',['project_id'=>$project->getId(),'choised_lang'=>$request->get('choised_lang')]);
        }

        return $this->render('source/sourceUpload.html.twig', array(
            'controller_name' => 'SourceController',
            'name' => 'STEST',
            'formP'=>$form->createView(),
        ));

    }

    /**
     * @Route("/modify_source_strings" ,name="modify_source_strings")
     */

    public function modifySources(Request $request, ObjectManager $menager)
    {
        /**@var User $user */
        $user = $this->getUser();
        $project_id = $request->get('project_id');
        $choised_src = $request->get('choised_src');
        $choised_lang = $request->get('choised_lang');
        $translated_src_key = $request->get('translated_keys');
        $translated_src = $request->get('translated_values');
        $project = $user->getProjectById($project_id);
        /** @var Source $source */
        $source = $project->getSourceByName($choised_src);
        $srcStrings =$source->getStrings();
        $translatedStrings =$source->getTranslatedStringsByLang($choised_lang);

        if(!is_null($translated_src))
        {
            for($i = 0 ; $i < count($translated_src); $i++)
            {

                if( strlen($translated_src[$i]) > 0)
                {
                    $source->addTranslatedStrings($translated_src_key[$i],$choised_lang , $translated_src[$i]);
                }
            }
            dump($source);
            $menager->persist($source);
            $menager->flush();

        }

        return $this->render('source/modify_source_strings.html.twig', [
            'controller_name' => 'SourceController',
            'strings'=>$srcStrings,
            'project_blocked'=>$project->isBlocked()
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
