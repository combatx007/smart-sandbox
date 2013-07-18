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
     * @var ArrayCollection
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

    /**
     * Add articles
     *
     * @param \SmartCore\Bundle\BlogBundle\Article $articles
     * @return Category
     */
    public function addArticle(\SmartCore\Bundle\BlogBundle\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \SmartCore\Bundle\BlogBundle\Article $articles
     */
    public function removeArticle(\SmartCore\Bundle\BlogBundle\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUriPart($uri_part)
    {
        $this->uri_part = $uri_part;
    }

    public function getUriPart()
    {
        return $this->uri_part;
    }
}