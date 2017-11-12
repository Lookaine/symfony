<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 06/11/17
 * Time: 13:28
 */


class helloWorld extends Controller{
    /**
     *  @Route("/text/helloworld", name="helloworld")
     */
    public function hello() {
        $val = "hello world";

        return new Response('<html><body>'.$val.'</body></html>');
    }

    public function bonjour(){
        $val = "Bonjour le monde";
        return new Response('<html><body>'.$val.'</body></html>');
    }
}