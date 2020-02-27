<?php

namespace VieEleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="VieEleveBundle\Repository\restaurantRepository")
 */
class restaurant
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
     * @ORM\Column(name="menu", type="string", length=255)
     */
    private $menu;

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
     * Set menu.
     *
     * @param string $menu
     *
     * @return restaurant
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu.
     *
     * @return string
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set dateInscription.
     *
     * @param \DateTime $dateInscription
     *
     * @return restaurant
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
     * @return restaurant
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
     * @param float $montant
     *
     * @return restaurant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant.
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }
}
