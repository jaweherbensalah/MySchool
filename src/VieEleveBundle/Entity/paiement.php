<?php

namespace VieEleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="VieEleveBundle\Repository\paiementRepository")
 */
class paiement
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
     * @var float
     *
     * @ORM\Column(name="montant_a_payer", type="float")
     */
    private $montantAPayer;

    /**
     * @var float
     *
     * @ORM\Column(name="montant_paye", type="float")
     */
    private $montantPaye;

    /**
     * @var float
     *
     * @ORM\Column(name="reste_a_payer", type="float")
     */
    private $resteAPayer;


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
     * Set montantAPayer.
     *
     * @param float $montantAPayer
     *
     * @return paiement
     */
    public function setMontantAPayer($montantAPayer)
    {
        $this->montantAPayer = $montantAPayer;

        return $this;
    }

    /**
     * Get montantAPayer.
     *
     * @return float
     */
    public function getMontantAPayer()
    {
        return $this->montantAPayer;
    }

    /**
     * Set montantPaye.
     *
     * @param float $montantPaye
     *
     * @return paiement
     */
    public function setMontantPaye($montantPaye)
    {
        $this->montantPaye = $montantPaye;

        return $this;
    }

    /**
     * Get montantPaye.
     *
     * @return float
     */
    public function getMontantPaye()
    {
        return $this->montantPaye;
    }

    /**
     * Set resteAPayer.
     *
     * @param float $resteAPayer
     *
     * @return paiement
     */
    public function setResteAPayer($resteAPayer)
    {
        $this->resteAPayer = $resteAPayer;

        return $this;
    }

    /**
     * Get resteAPayer.
     *
     * @return float
     */
    public function getResteAPayer()
    {
        return $this->resteAPayer;
    }
}
