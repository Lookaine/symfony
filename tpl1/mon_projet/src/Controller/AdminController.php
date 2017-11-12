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

class AdminController extends Controller{
    /**
     *  @Route("/admin", name="admin")
     */
    public function index(){

        return $this->render('admin.html.twig');
    }
}