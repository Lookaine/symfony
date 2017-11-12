<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 08/11/17
 * Time: 10:57
 */
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller{

    public function login(Request $request, AuthenticationUtils $authUtils){
        $errors = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('login.html.twig', array(
           'last_usernamee' => $lastUsername,
            'error' => $errors,
        ));

    }
}