<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nom;
    /**
     * @ORM\Column(type="string")
     */
    protected $prenom;



    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $textPresentation;



    /**
     * @ORM\ManyToMany(targetEntity="Groupe", cascade={"persist"},inversedBy="users")
     */
    private $groupes;


    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/jpg",})
     */
    private $brochure;



    /**
     * @ORM\OneToMany(targetEntity="Groupe", mappedBy="admin")
     * @ORM\JoinColumn(nullable=true)
     */
    private $groupsAdmin;




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }


    public function addGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes[] = $groupe;
        return $this;
    }

    /**
     * Remove groupe
     *
     * @param \AppBundle\Entity\Groupe $groupe
     */
    public function removeGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }

    /**
     * Set textPresentation
     *
     * @param string $textPresentation
     *
     * @return User
     */
    public function setTextPresentation($textPresentation)
    {
        $this->textPresentation = $textPresentation;

        return $this;
    }

    /**
     * Get textPresentation
     *
     * @return string
     */
    public function getTextPresentation()
    {
        return $this->textPresentation;
    }



    /**
     * Set brochure
     *
     * @param string $brochure
     *
     * @return User
     */
    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }

    /**
     * Get brochure
     *
     * @return string
     */
    public function getBrochure()
    {
        return $this->brochure;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }



    /**
     * Add groupsAdmin
     *
     * @param \AppBundle\Entity\Groupe $groupsAdmin
     *
     * @return User
     */
    public function addGroupsAdmin(\AppBundle\Entity\Groupe $groupsAdmin)
    {
        $this->groupsAdmin[] = $groupsAdmin;

        return $this;
    }

    /**
     * Remove groupsAdmin
     *
     * @param \AppBundle\Entity\Groupe $groupsAdmin
     */
    public function removeGroupsAdmin(\AppBundle\Entity\Groupe $groupsAdmin)
    {
        $this->groupsAdmin->removeElement($groupsAdmin);
    }

    /**
     * Get groupsAdmin
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupsAdmin()
    {
        return $this->groupsAdmin;
    }
}
