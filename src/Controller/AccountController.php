<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

        if ($user == null)
            return $this->redirectToRoute('home');

        $form = $this->createFormBuilder($user)
            ->add('description')
            ->add('save_description', SubmitType::class, array('label' => 'Modifier votre description'))
            ->add('email')
            ->add('save_email', SubmitType::class, array('label' => 'Modifier votre e-mail'))
            ->getForm();

        $form->handleRequest($request);
        $manager->persist($user);
        $manager->flush();

        return $this->render('account/account.html.twig', [
            'form' => $form->createView(),
            'languages' => Language::getAllLocales(),
            'ico_array' => $this->renderIcons($user->getLanguage())
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

        if ($user == null)
            return $this->redirectToRoute('home');

        dump($oldpass);
        dump($newpass);
        if (!is_null($oldpass) && !is_null($newpass)) {
            $hash = $encoder->encodePassword($user, $oldpass);
            $hash2 = $encoder->encodePassword($user, $newpass);

            dump($user->getPassword());
            dump($hash);


            if ($encoder->isPasswordValid($user, $oldpass)) {
                $user->setPassword($hash2);
                $manager->persist($user);
                $manager->flush();
                $this->addFlash(
                    'notice',
                    'Votre mot de passe a bien été modifié !'
                );
            } else {
                $this->addFlash(
                    'notice',
                    'Votre ancien mot de passe est incorrect !'
                );
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

        dump($user);
        $langsList = $request->get("choised_lang");
        if (isset($langsList)) {
            foreach ($langsList as $key => $value) {
                $user->addLanguage($value);
            };
            $manager->persist($user);
            $manager->flush();
        }

        return $this->render('account/add_language.html.twig', [
            'languages' => Language::getAllLocales()
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

}



