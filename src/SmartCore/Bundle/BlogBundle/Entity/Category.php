<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Category entity.
 */
class Category {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="SmartCore\Bundle\BlogBundle\Article", inversedBy="category")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    protected $articles;

    /**
     * @ORM\Column(type="string")
     */
    protected $uri_part;

    public function __toString()
    {
        return $this->getName();
    }
}