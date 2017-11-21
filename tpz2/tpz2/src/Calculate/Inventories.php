<?php

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 16:33
 */
namespace App\Calculate;


use App\Entity\Person;
use App\Entity\Inventory;
use Doctrine\ORM\EntityManager;

class Inventories
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Person
     */
    private $person;

    /**
     * @var Inventory
     */
    private $inventory;

    /**
     * Inventory constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return bool
     */
    public function calcul(){
        $sum = 0;
        foreach ($this->person->getInventory() as $inventory){

            $sum += $inventory->getNumberOfItem() * $this->inventory->getMaterial()->getWeight();
        }
        $sum += $this->inventory->getNumberOfItem() * $this->inventory->getMaterial()->getWeight();

        if($this->person->getMaxWeight() < $sum){
            return false;
        }
        return true;
    }
}