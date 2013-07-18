<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Tag entity.
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="text", type="string", length=255)
     */
    protected $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="SmartCore\Bundle\BlogBundle\Entity\Article", mappedBy="tag")
     */
    protected $articles;

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
     * @param integer $name
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
     * Add articles
     *
     * @param \SmartCore\Bundle\BlogBundle\Entity\Article $articles
     * @return Tag
     */
    public function addArticle(\SmartCore\Bundle\BlogBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \SmartCore\Bundle\BlogBundle\Entity\Article $articles
     */
    public function removeArticle(\SmartCore\Bundle\BlogBundle\Entity\Article $articles)
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

    public function __toString()
    {
        return $this->getName();
    }
}