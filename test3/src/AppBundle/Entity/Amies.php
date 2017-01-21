<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmiesRepository")
 */
class Amies {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="float", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $age;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $famille;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $race;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $nourriture;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="amies")
     */
    private $user;

    function getId() {
        return $this->id;
    }

    function getAge() {
        return $this->age;
    }

    function getFamille() {
        return $this->famille;
    }

    function getRace() {
        return $this->race;
    }

    function getNourriture() {
        return $this->nourriture;
    }

    function getUser() {
        return $this->user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setFamille($famille) {
        $this->famille = $famille;
    }

    function setRace($race) {
        $this->race = $race;
    }

    function setNourriture($nourriture) {
        $this->nourriture = $nourriture;
    }

    function setUser($user) {
        $this->user = $user;
    }

}
