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
    public function showSources(Request $request)
    {
        $user = $this->getUser();
        $choised_lang = $request->get('choised_lang');
        $project_id = $request->get('project_id');
        $project = $user->getProjectById($project_id);
        $src =$project->getSourcesNames();
        dump($src);

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
            $data = $form->getData();

            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();

            /*dump($file);
            dump($file->getClientOriginalName());
            dump($file->getClientOriginalExtension());
            dump($file->guessExtension());

            dump($fileName);*/

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );
            $source->setFile($fileName);
            $source->setName($file->getClientOriginalName());
            $source->setProject($project);
            $source->readStringsFromFile();
            dump($source);
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
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
