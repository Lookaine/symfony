<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 08/11/17
 * Time: 08:50
 */
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class HomePageController extends Controller{
    /**
     *  @Route("/homepage", name="homepage")
     */
    public function index(UserInterface $user){

        dump($user);
        return $this->render('home.html.twig');
    }
}