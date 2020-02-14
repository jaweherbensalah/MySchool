<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="nom_event", type="string", length=255)
     */
    private $nomEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="placeDispo", type="integer")
     */
    private $placeDispo;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateEvent", type="date", nullable=false)
     * @Assert\GreaterThan("today")
     */
    private $dateevent;

    /**
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    private  $club_id;
    /**
     * @var string
     *
     * @ORM\Column(name="HeureEvent", type="string", length=20, nullable=false)
     */
    private $heureevent;

    /**
     * @return \DateTime
     */
    public function getDateevent()
    {
        return $this->dateevent;
    }

    /**
     * @param \DateTime $dateevent
     */
    public function setDateevent($dateevent)
    {
        $this->dateevent = $dateevent;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png"})
     */
    private $image;

    /**
     * @return string
     */
    public function getHeureevent()
    {
        return $this->heureevent;
    }

    /**
     * @param string $heureevent
     */
    public function setHeureevent($heureevent)
    {
        $this->heureevent = $heureevent;
    }

    /**


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
     * Set nomEvent
     *
     * @param string $nomEvent
     *
     * @return Event
     */
    public function setNomEvent($nomEvent)
    {
        $this->nomEvent = $nomEvent;

        return $this;
    }

    /**
     * Get nomEvent
     *
     * @return string
     */
    public function getNomEvent()
    {
        return $this->nomEvent;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set placeDispo
     *
     * @param integer $placeDispo
     *
     * @return Event
     */
    public function setPlaceDispo($placeDispo)
    {
        $this->placeDispo = $placeDispo;

        return $this;
    }

    /**
     * Get placeDispo
     *
     * @return int
     */
    public function getPlaceDispo()
    {
        return $this->placeDispo;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club_id;
    }

    /**
     * @param mixed $club_id
     */
    public function setClub($club_id)
    {
        $this->club_id = $club_id;
    }





}

