<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="Notification")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupeRepository")
 */
class Notification
{

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="group")
     */
    private $users;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nbMembres", type="integer", nullable=true)
     */
    private $nbMembres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutG", type="date")
     */
    private $dateDebutG;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinG", type="date")
     */
    private $dateFinG;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuG", type="string", length=100)
     */
    private $lieuG;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbMembres
     *
     * @param integer $nbMembres
     *
     * @return Groupe
     */
    public function setNbMembres($nbMembres)
    {
        $this->nbMembres = $nbMembres;

        return $this;
    }

    /**
     * Get nbMembres
     *
     * @return int
     */
    public function getNbMembres()
    {
        return $this->nbMembres;
    }

    /**
     * Set dateDebutG
     *
     * @param \DateTime $dateDebutG
     *
     * @return Groupe
     */
    public function setDateDebutG($dateDebutG)
    {
        $this->dateDebutG = $dateDebutG;

        return $this;
    }

    /**
     * Get dateDebutG
     *
     * @return \DateTime
     */
    public function getDateDebutG()
    {
        return $this->dateDebutG;
    }

    /**
     * Set dateFinG
     *
     * @param \DateTime $dateFinG
     *
     * @return Groupe
     */
    public function setDateFinG($dateFinG)
    {
        $this->dateFinG = $dateFinG;

        return $this;
    }

    /**
     * Get dateFinG
     *
     * @return \DateTime
     */
    public function getDateFinG()
    {
        return $this->dateFinG;
    }

    /**
     * Set lieuG
     *
     * @param string $lieuG
     *
     * @return Groupe
     */
    public function setLieuG($lieuG)
    {
        $this->lieuG = $lieuG;

        return $this;
    }

    /**
     * Get lieuG
     *
     * @return string
     */
    public function getLieuG()
    {
        return $this->lieuG;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Notification
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
