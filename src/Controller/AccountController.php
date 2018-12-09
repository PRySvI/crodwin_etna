<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function account_description(Request $request, ObjectManager $manager)
    {
        $user = $this ->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder($user)
                     ->add('description')
                     ->add('save', SubmitType::class, array('label'=> 'Modifier votre description'))
                     ->getForm();

        $form->handleRequest($request);
        $manager->persist($user);
        $manager->flush();
        dump($user);

        return $this->render('account/account.html.twig', [
            'formDescription' => $form->createView()
        ]);
    }
}
