<?php

namespace Acme\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use SmartCore\Bundle\BlogBundle\Entity\Article as SmartArticle;

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
class Article extends SmartArticle
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
    protected $user_id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @param string $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
