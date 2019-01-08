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
        if (!is_null($oldpass) && !is_null($newpass)) {
            $hash = $encoder->encodePassword($user, $oldpass);
            $hash2 = $encoder->encodePassword($user, $newpass);

            dump($user->getPassword());
            dump($hash);

            $okay = 'OKAY CHNAGED!!!!';

            if ($encoder->isPasswordValid($user, $oldpass)) {
                $user->setPassword($hash2);
                $manager->persist($user);
                $manager->flush();
                dump($okay);
            }

            //return $this->redirectToRoute('account');
        }

        return $this->render('account/change_password.html.twig');
    }

    /**
     * @Route("/add_language", name="add_language")
     */
    public function add_language(Request $request, ObjectManager $manager)
    {
        /** @var User $user */
        $user = $this->getUser();
       // $langsList = $request->get("languages");


        $form = $this->createFormBuilder($user)
            ->add('language', ChoiceType::class, array(
                'choices' => array_count_values(Language::getAllLocales()),
            ))
            ->add('save_language', SubmitType::class, array('label' => 'Ajouter une langue'))
            ->getForm();
        $form -> handleRequest($request);

        if($form->isSubmitted()) {
            $langsList = $request->get("languages");

            foreach ($langsList as $key => $value) {
                $user->addLanguage($value);
            };

            $user->addLanguage($langsList);
            $manager->persist($user);
            $manager->flush();
        }

        dump($user);

        return $this->render('account/add_language.html.twig', [
            'languages' => Language::getAllLocales(),
            'form' => $form->createView()
        ]);
    }
}

