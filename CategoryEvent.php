<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryEvent
 *
 * @ORM\Table(name="category_event")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\CategoryEventRepository")
 */
class CategoryEvent
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
     * @ORM\Column(name="NomCategory", type="string", length=255)
     */
    private $nomCategory;


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
     * Set nomCategory
     *
     * @param string $nomCategory
     *
     * @return CategoryEvent
     */
    public function setNomCategory($nomCategory)
    {
        $this->nomCategory = $nomCategory;

        return $this;
    }

    /**
     * Get nomCategory
     *
     * @return string
     */
    public function getNomCategory()
    {
        return $this->nomCategory;
    }
}

