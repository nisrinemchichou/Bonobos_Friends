<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as FOSUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends FOSUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Amies", inversedBy="user")
     * @ORM\JoinTable(
     *     name="AmiesToUser",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="amies_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $amies;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getAmies() {
        return $this->amies;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAmies($amies) {
        $this->amies = $amies;
    }

    function __construct() {
        $this->amies = new ArrayCollection();
    }

}
