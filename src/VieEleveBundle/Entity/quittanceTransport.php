<?php

namespace VieEleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * quittanceTransport
 *
 * @ORM\Table(name="quittance_transport")
 * @ORM\Entity(repositoryClass="VieEleveBundle\Repository\quittanceTransportRepository")
 */
class quittanceTransport
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
     * @ORM\OneToOne(targetEntity="VieEleveBundle\Entity\abonneTransport")
     * @ORM\JoinColumn(name="eleve_transport_id",referencedColumnName="id")
     */
    private $eleve_transport;

    /**
     * @return mixed
     */
    public function getEleveTransport()
    {
        return $this->eleve_transport;
    }

    /**
     * @param mixed $eleve_transport
     */
    public function setEleveTransport($eleve_transport)
    {
        $this->eleve_transport = $eleve_transport;
    }



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