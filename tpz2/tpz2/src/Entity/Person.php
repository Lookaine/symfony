<?php

/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 13/11/17
 * Time: 14:08
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="person")
 */

class Person
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     *
     */
    protected $name;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $maxWeight;

    /**
     * @var $inventory Inventory[]
     * @ORM\OneToMany(targetEntity="Inventory", mappedBy="person")
     */
    protected $inventory;


    /**
     * Person constructor.
     * @param $inventory
     */
    public function __construct()
    {
        $this->inventory = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @param float $maxWeight
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param mixed $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }

    function __toString()
    {
        return $this->name;
    }

}