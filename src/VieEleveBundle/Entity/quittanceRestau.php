<?php

namespace VieEleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * quittanceRestau
 *
 * @ORM\Table(name="quittance_restau")
 * @ORM\Entity(repositoryClass="VieEleveBundle\Repository\quittanceRestauRepository")
 */
class quittanceRestau
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
     * @return mixed
     */
    public function getEleveRestau()
    {
        return $this->eleve_restau;
    }

    /**
     * @param mixed $eleve_restau
     */
    public function setEleveRestau($eleve_restau)
    {
        $this->eleve_restau = $eleve_restau;
    }

    /**
     * @ORM\OneToOne(targetEntity="VieEleveBundle\Entity\eleveRestau")
     * @ORM\JoinColumn(name="abonne_restau_id",referencedColumnName="id")
     */
    private $eleve_restau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_inscription", type="datetime")
     */
    private $debutInscription;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_inscription", type="datetime")
     */
    private $finInscription;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


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
     * Set debutInscription.
     *
     * @param \DateTime $debutInscription
     *
     * @return quittanceRestau
     */
    public function setDebutInscription($debutInscription)
    {
        $this->debutInscription = $debutInscription;

        return $this;
    }

    /**
     * Get debutInscription.
     *
     * @return \DateTime
     */
    public function getDebutInscription()
    {
        return $this->debutInscription;
    }

    /**
     * Set finInscription.
     *
     * @param \DateTime $finInscription
     *
     * @return quittanceRestau
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
     * Set prix.
     *
     * @param float $prix
     *
     * @return quittanceRestau
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix.
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
