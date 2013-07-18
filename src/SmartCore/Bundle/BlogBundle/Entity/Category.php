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
     * @ORM\ManyToOne(targetEntity="SmartCore\Bundle\BlogBundle\Post", inversedBy="category")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $posts;
}