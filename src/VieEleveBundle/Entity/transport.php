<?php

namespace VieEleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity(repositoryClass="VieEleveBundle\Repository\transportRepository")
 */
class transport
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime")
     */
    private $dateInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_inscription", type="datetime")
     */
    private $finInscription;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateInscription.
     *
     * @param \DateTime $dateInscription
     *
     * @return transport
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription.
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set finInscription.
     *
     * @param \DateTime $finInscription
     *
     * @return transport
     */
    public function setFinInscription($finInscription)
    {
        $this->finInscription = $finInscription;

        return $this;
    }

    /**
     * Get finInscription.
     *
     * @return \DateTime
     */
    public function getFinInscription()
    {
        return $this->finInscription;
    }

    /**
     * Set montant.
     *
     * @param string $montant
     *
     * @return transport
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant.
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }
}
