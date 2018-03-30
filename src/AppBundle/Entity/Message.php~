<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


    /**

     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */

    private $userDestinataire;

    /**

     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */

    private $userExpediteur;


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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set userDestinataire
     *
     * @param \AppBundle\Entity\User $userDestinataire
     *
     * @return Message
     */
    public function setUserDestinataire(\AppBundle\Entity\User $userDestinataire)
    {
        $this->userDestinataire = $userDestinataire;

        return $this;
    }

    /**
     * Get userDestinataire
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserDestinataire()
    {
        return $this->userDestinataire;
    }

    /**
     * Set userExpediteur
     *
     * @param \AppBundle\Entity\User $userExpediteur
     *
     * @return Message
     */
    public function setUserExpediteur(\AppBundle\Entity\User $userExpediteur)
    {
        $this->userExpediteur = $userExpediteur;

        return $this;
    }

    /**
     * Get userExpediteur
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserExpediteur()
    {
        return $this->userExpediteur;
    }
}
