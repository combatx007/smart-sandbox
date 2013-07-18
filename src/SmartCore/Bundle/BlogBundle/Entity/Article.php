<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use SmartCore\Bundle\BlogBundle\Entity\Tag as Tag;

/**
 * @ORM\Entity HasLifecycleCallBacks
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $annotation;

    /**
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @ORM\Column(type="string")
     */
    protected $keywords;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="SmartCore\Bundle\BlogBundle\Entity\Category", mappedBy="articles")
     */
    protected $category;

    /**
     * @ORM\Column(type="string")
     */
    protected $uri_part;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * Tags for article
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="blog_articles_tags",
     *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    private $tags;

    public function __construct($updated = null)
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->tags = new ArrayCollection();
    }

    /**
     * @param string annotation
     * @return $this
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
        return $this;
    }

    /**
     * @return $this->annotation
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return $this->category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return $this->created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return $this->description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $id
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
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return $this->keywords
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Add tags
     *
     * @param Tag $tags
     * @return Article
     */
    public function addTag(\SmartCore\Bundle\BlogBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \SmartCore\Bundle\BlogBundle\Entity\Tag $tags
     */
    public function removeTag(\SmartCore\Bundle\BlogBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return $this->text
     */
    public function getText()
    {
        return $this->text;
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
     * @param string $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return $this->updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param string $uri_part
     * @return $this
     */
    public function setUriPart($uri_part)
    {
        $this->uri_part = $uri_part;
        return $this;
    }

    /**
     * @return $this->uri_part
     */
    public function getUriPart()
    {
        return $this->uri_part;
    }

    /**
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return $this->user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}