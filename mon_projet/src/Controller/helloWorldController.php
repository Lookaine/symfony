<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class helloWorldController extends Controller{
    /**
     * @Route("/twig/hello", name="twig_hello")
     */
    function hello() {
        $valeur = "Hello world";

        return $this->render(
            'helloWorld/hello.html.twig',['valeur' => $valeur]
        );
    }

    /**
     * @Route("/twig/hello2", name="twig_hello2")
     * @param string $bonjour
     * @return Response
     */
    function hello2($bonjour = "Bonjour world") {
        return $this->render(
            'helloWorld/hello2.html.twig',array('bonjour' => $bonjour)
        );
    }

    /**
     * @Route("/menu", name="menu")
     * @return Response
     */
    function menu(){
        return $this->render('helloWorld/menu.html.twig');
    }




}