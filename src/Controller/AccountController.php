<?php

namespace App\Controller;

use App\Entity\ChangePassword;
use App\Form\ChangePasswordType;
use Doctrine\Common\Persistence\ObjectManager;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
        $change_pass = new ChangePassword();
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ChangePasswordType::class,$change_pass);

        $form->handleRequest($request);

        //check si pas anonyme
        if ($user!=null) {
            //recupère l'id de l'user
            $change_pass->setUserId($user->getId());
            //associe OldPassword au password actuel
            $change_pass->setOldPassword($user->getPassword());

            //defini un nouveau mdp (il doit être encodé, là il ne l'est pas)
            $newEncodedPassword = $encoder->encodePassword($user, $change_pass->getNewPassword());
            $user->setPassword($newEncodedPassword);
            $em->persist($user);
            $em->flush();
        }

        if ($change_pass->getOldPassword() != $user->getPassword()) {
            $form->addError(new FormError('Ancien mot de passe incorrect'));
        }
        dump($change_pass);
        return $this->render('account/change_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
/*
    public function edit_password(Request $request)
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

