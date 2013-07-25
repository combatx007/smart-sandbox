<?php

namespace Acme\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Article as SmartArticle;

/**
 * @ORM\Entity
 * @ORM\Table(name="news",
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
