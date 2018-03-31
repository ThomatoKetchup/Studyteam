<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupeRepository")
 * @UniqueEntity("nomG")
 */

class Groupe
{


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="filiereG", type="string", length=100)
     */
    private $filiereG;

    /**
     * @var string
     *
     * @ORM\Column(name="anneeEtudeG", type="string", length=100)
     */
    private $anneeEtudeG;

    /**
     * @var string
     *
     * @ORM\Column(name="matiereG", type="string", length=100)
     */
    private $matiereG;

    /**
     * @var string
     *
     * @ORM\Column(name="jourG", type="string", length=100)
     */
    private $jourG;


    /**
     * @var \Time
     *
     * @ORM\Column(name="heureDebutG", type="time")
     */
    private $heureDebutG;

    /**
     * @var \Time
     *
     * @ORM\Column(name="heureFinG", type="time")
     */
    private $heureFinG;

    /**
     * @var string
     *
     * @ORM\Column(name="nomG", type="string", length=100, unique=true)
     */
    private $nomG;


    /**
     * @ORM\ManyToMany(targetEntity="User", cascade={"persist"}, mappedBy="groupes")
     */
    protected $users;


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
     * @return Groupe
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

    /**
     * Set filiereG
     *
     * @param string $filiereG
     *
     * @return Groupe
     */
    public function setFiliereG($filiereG)
    {
        $this->filiereG = $filiereG;

        return $this;
    }

    /**
     * Get filiereG
     *
     * @return string
     */
    public function getFiliereG()
    {
        return $this->filiereG;
    }

    /**
     * Set anneeEtudeG
     *
     * @param string $anneeEtudeG
     *
     * @return Groupe
     */
    public function setAnneeEtudeG($anneeEtudeG)
    {
        $this->anneeEtudeG = $anneeEtudeG;

        return $this;
    }

    /**
     * Get anneeEtudeG
     *
     * @return string
     */
    public function getAnneeEtudeG()
    {
        return $this->anneeEtudeG;
    }

    /**
     * Set matiereG
     *
     * @param string $matiereG
     *
     * @return Groupe
     */
    public function setMatiereG($matiereG)
    {
        $this->matiereG = $matiereG;

        return $this;
    }

    /**
     * Get matiereG
     *
     * @return string
     */
    public function getMatiereG()
    {
        return $this->matiereG;
    }

    /**
     * Set jourG
     *
     * @param string $jourG
     *
     * @return Groupe
     */
    public function setJourG($jourG)
    {
        $this->jourG = $jourG;

        return $this;
    }

    /**
     * Get jourG
     *
     * @return string
     */
    public function getJourG()
    {
        return $this->jourG;
    }

    /**
     * Set heureDebutG
     *
     * @param \DateTime $heureDebutG
     *
     * @return Groupe
     */
    public function setHeureDebutG($heureDebutG)
    {
        $this->heureDebutG = $heureDebutG;

        return $this;
    }

    /**
     * Get heureDebutG
     *
     * @return \DateTime
     */
    public function getHeureDebutG()
    {
        return $this->heureDebutG;
    }

    /**
     * Set heureFinG
     *
     * @param \DateTime $heureFinG
     *
     * @return Groupe
     */
    public function setHeureFinG($heureFinG)
    {
        $this->heureFinG = $heureFinG;

        return $this;
    }

    /**
     * Get heureFinG
     *
     * @return \DateTime
     */
    public function getHeureFinG()
    {
        return $this->heureFinG;
    }

    /**
     * Set nomG
     *
     * @param string $nomG
     *
     * @return Groupe
     */
    public function setNomG($nomG)
    {
        $this->nomG = $nomG;

        return $this;
    }

    /**
     * Get nomG
     *
     * @return string
     */
    public function getNomG()
    {
        return $this->nomG;
    }
}
