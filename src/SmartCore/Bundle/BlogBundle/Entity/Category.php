<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use SmartCore\Bundle\BlogBundle\Article as Article;

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
     * @param Article $articles
     * @return $this
     */
    public function addArticle(Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param Article $articles
     */
    public function removeArticle(Article $articles)
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

    /**
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return $this->id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string $this->name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return $this->title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $uri_part
     * @return $this
     */
    public function setUriPart($uri_part)
    {
        $this->uri_part = $uri_part;
    }

    /**
     * @return $this->uri_part
     */

    public function getUriPart()
    {
        return $this->uri_part;
    }
}