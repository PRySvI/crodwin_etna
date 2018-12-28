<?php

namespace App\Controller;

use App\Entity\ChangePassword;
use App\Form\ChangePasswordType;
use Doctrine\Common\Persistence\ObjectManager;
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
/**    public function change_password(Request $request, ObjectManager $manager)
    {
        $changePasswordModel = new ChangePassword();

        $form_pass = $this->createForm($changePasswordModel)
            ->add('old_password', PasswordType::class)
            ->add('new_password', RepeatedType::class, array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'required' => true,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password')
            ))
            ->getForm();

        $form_pass->handleRequest($request);
        $manager->persist($changePasswordModel);
        $manager->flush();

        // if ($form_passwd->isSubmitted() && $form_passwd->isValid()) {
        //     return $this->redirect($this->generateUrl('homepage'));
        //}

        return $this->render('account/change_password.html.twig', [
            'form_pass' => $form_pass->createView(),
        ]);
    }
**/
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
        if ($form->isSubmitted() && $form->isValid()) {


            $passwordEncoder = $this->get('security.password_encoder');
            $oldPassword = $request->request->get('etiquettebundle_user')['oldPassword'];

            // Si l'ancien mot de passe est bon
            if ($form->isSubmitted() && $form->isValid()) {
                $newEncodedPassword = $passwordEncoder->encodePassword($user, $change_pass->getNewPassword());
                $user->setPassword($newEncodedPassword);

                $em->persist($user);
                $em->flush();

                $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                return $this->redirectToRoute('account');
            } else {
                $form->addError(new FormError('Ancien mot de passe incorrect'));
            }
        }

        $form->handleRequest($request);
        //$hash = $encoder->encodePassword($user, $user->getPassword());
        //$user->setPassword($hash);
        //$manager->persist($user);
        //$manager->flush();
        if ($user!=null) {
            // check si on est pas Anonyme
            $change_pass->setUserId($user->getId());
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

