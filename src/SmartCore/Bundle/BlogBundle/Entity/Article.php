<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use SmartCore\Bundle\BlogBundle\Entity\Tag;
use SmartCore\Bundle\BlogBundle\Entity\Category;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles",
 *      indexes={
 *          @ORM\Index(name="user_id", columns={"user_id"}),
 *          @ORM\Index(name="created", columns={"created"})
 *      }
 * )
 * @UniqueEntity(fields={"uri_part"}, message="Статья с таким сегментом URI уже существует.")
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
     * @ORM\OneToMany(targetEntity="Category", mappedBy="article")
     */
    protected $category;

    /**
     * @ORM\Column(type="string", unique=true)
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="articles_tags_relations",
     *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    protected $tags;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = null;
        $this->tags = new ArrayCollection();
    }

    /**
     * @param string $annotation
     * @return $this
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return \Datetime
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return integer
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
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
        return $this;
    }

    /**
     * @return Tag[]
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
     * @return string
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime|null
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
     * @return string
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
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
