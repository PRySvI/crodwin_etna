<?php

namespace App\Controller;

use App\Entity\Source;
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
            return $this->redirectToRoute('modify_source_strings',['project_id'=>$project->getId(), 'choised_src'=>$choised_src ]);
        }
        if(count($src)==0)
        {
            return $this->redirectToRoute('create_source',['project_id'=>$project->getId()]);
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
        $project_id = $request->get('project_id');
        $choised_src = $request->get('choised_src');
        $project = $this->getUser()->getProjectById($project_id);
        $srcStrings =$project->getSourceByName($choised_src)->getStrings();
        return $this->render('source/modify_source_strings.html.twig', [
            'controller_name' => 'SourceController',
            'strings'=>$srcStrings
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
