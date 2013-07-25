<?php

namespace Acme\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use SmartCore\Bundle\BlogBundle\Model\Article as SmartArticle;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_articles",
 *      indexes={
 *          @ORM\Index(name="created", columns={"created"})
 *      }
 * )
 */
class Article extends SmartArticle
{
    /**
     * @ORM\OneToOne(targetEntity="Acme\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="blog_articles_tags_relations",
     *      joinColumns={@ORM\JoinColumn(name="article_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id")}
     * )
     */
    protected $tags;

    /**
     * @param mixed $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return \Acme\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
