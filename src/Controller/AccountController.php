<?php

namespace App\Controller;

use App\Entity\ChangePassword;
use App\Entity\User;
use App\Form\ChangePasswordType;
use Doctrine\Common\Persistence\ObjectManager;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Language;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     * @param Request $request
     * @param ObjectManager $menager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function account_description(Request $request, ObjectManager $manager)
    {
        $user = $this->getUser();

        $form = $this->createFormBuilder($user)
            ->add('description')
            ->add('save_description', SubmitType::class, array('label' => 'Modifier votre description'))
            ->add('email')
            ->add('save_email', SubmitType::class, array('label' => 'Modifier votre e-mail'))
            ->add('defaultLang', ChoiceType::class, array(
                'choices' => array_count_values(Language::getAllLocales()),
                'label' => 'Ajouter une langue',
                'preferred_choices' => array('French (France)')
            ))
            ->add('save_language', SubmitType::class, array('label' => 'Ajouter une langue'))
            ->getForm();

        $form->handleRequest($request);
        $manager->persist($user);
        $manager->flush();
        dump($user);

        return $this->render('account/account.html.twig', [
            'form' => $form->createView(),
            'languages' => Language::getAllLocales()
        ]);

    }


    /**
     * @Route("/change_password", name="change_password")
     */
    public function changePasswordAction(Request $request, UserPasswordEncoderInterface $encoder, ObjectManager $manager)
    {
        /** @var User $user */
        $user = $this->getUser();
        $newpass = $request->get('newpass');
        $oldpass = $request->get('oldpass');

        dump($oldpass);
        dump($newpass);
        if(!is_null($oldpass) && !is_null($newpass))
        {
            $hash = $encoder->encodePassword($user, $oldpass);
            $hash2 = $encoder->encodePassword($user, $newpass);

            dump($user->getPassword());
            dump($hash);

            $okay = 'OKAY CHNAGED!!!!';

            if($encoder->isPasswordValid($user, $oldpass)) {
                $user->setPassword($hash2);
                $manager->persist($user);
                $manager->flush();
                dump($okay);
            }

            //return $this->redirectToRoute('account');
        }

        return $this->render('account/change_password.html.twig');
    }
}
/*
    public function edit_password(Request $request) $2y$13$oe3/jlD16pfWTtU0DgNzVOxAjW12xrwkZiBPkzPoEOPr0/ftetose
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($email);

        $form = $this->createFormBuilder($user)
            ->add('email')
            ->add('save', SubmitType::class, array('label'=> 'Modifier votre email'))
            ->getForm();

        $form->handleRequest($request);
        $manager->persist($user);
        $manager->flush();

        return $this->render('account/account.html.twig', [
            'form' => $form->createView()
        ]);
    }

**/

