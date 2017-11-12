<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 06/11/17
 * Time: 16:12
 */

namespace App\Controller;
use User;

class EntityController
{
    /**
     * @Route("/entity", name="entity")
     * @return mixed
     */
    function createEntity(){
        $entity = new User("horn","nicolas","Lookaine","nicolas.hornlemire@gmail.com","Lookaine#7597");
    }

}