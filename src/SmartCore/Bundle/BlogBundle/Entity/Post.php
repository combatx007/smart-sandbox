<?php

namespace SmartCore\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
/**
 * @ORM\Entity HasLifecycleCallBacks
 * @ORM\Table(name="post")
 */
class Post
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
    protected $post;

    /**
     * @ORM\Column(type="string")
     */
    protected $keyword;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="SmartCore\Bundle\BlogBundle\Entity\Category", mappedBy="posts")
     */
    protected $category;

    /**
     * @ORM\Column(type="string")
     */
    protected $uri_part;

    /**
     * @ORM\Column(type="string")
     */
    protected $user;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * Tags for post
     *
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="SmartCore\Bundle\BlogBundle\Entity\Tag")
     * @ORM\JoinTable(name="blog_posts_tags",
     *      joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    private $tags;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->user = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        $this->setCreated($this->getCreated());
        $this->setUpdated($this->getUpdated());
    }
}