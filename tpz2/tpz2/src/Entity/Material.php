<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 13:07
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MAterial
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="material")
 */

class Material
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
     * @ORM\Column(type="decimal", precision=3, scale=1)
     */
    protected $weight;

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
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    function __toString()
    {
        return $this->name;
    }


}