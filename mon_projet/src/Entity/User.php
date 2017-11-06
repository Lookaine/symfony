<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 06/11/17
 * Time: 15:41
 */


use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity
 * @ORM\table(name="user")
 */

class User{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var $nom String
     * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     * @var $prenom String
     * @ORM\Column(type="string")
     */
    protected $prenom;

    /**
     * @var $github_username String
     * @ORM\Column(type="string")
     */

    protected $github_username;

    /**
     * @var $mail String
     * @ORM\Column(type="string")
     */

    protected $mail;

    /**
     * @var $nomdiscord String
     * @ORM\Column(type="string")
     */


    protected $nomdiscord;
    //Lookaine#7597

    /**
     * User constructor.
     * @param int $id
     * @param String $nom
     * @param String $prenom
     * @param String $github_username
     * @param String $mail
     * @param String $nomdiscord
     */
    public function __construct($id, $nom, $prenom, $github_username, $mail, $nomdiscord)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->github_username = $github_username;
        $this->mail = $mail;
        $this->nomdiscord = $nomdiscord;
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
     * @return String
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getGithubUsername()
    {
        return $this->github_username;
    }

    /**
     * @param String $github_username
     */
    public function setGithubUsername($github_username)
    {
        $this->github_username = $github_username;
    }

    /**
     * @return $mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param $mail $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return String
     */
    public function getNomdiscord()
    {
        return $this->nomdiscord;
    }

    /**
     * @param String $nomdiscord
     */
    public function setNomdiscord($nomdiscord)
    {
        $this->nomdiscord = $nomdiscord;
    }

}