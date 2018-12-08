<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $menager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form -> handleRequest($request);

        if($form->isSubmitted() && $form -> isValid())
        {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $menager->persist($user);
            $menager->flush();
            //Partie d'auto login apres l'inscription
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->container->get('security.token_storage')->setToken($token);
            $this->get('session')->set('_security_main',serialize($token));


        }
        return $this ->render('security/registration.html.twig', ['form' => $form->createView()
        ]);

    }
    /**
     * @Route("/connection", name="security_login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        // recevoir un erreur s'il existe
        $error = $authUtils->getLastAuthenticationError();

        // derniere login d'utlisateur
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {

    }

    /**
     * @Route("/hello", name="hello_page")
     */
    public function index()
    {
        return $this->render('security/hello.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('security/home.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/account", name="account")
     */
    public function account()
    {
        return $this->render('security/account.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

}
