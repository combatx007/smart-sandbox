<?php
namespace Acme\DataFixturesBundle\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Acme\UserBundle\Entity\User;
use Acme\BlogBundle\Entity\Article;
use Acme\BlogBundle\Entity\Category;
use Acme\BlogBundle\Entity\Tag;
use FOS\UserBundle\Model\UserManager;

class LoadPostData extends ContainerAware implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($userAdmin);
        $userAdmin->setPassword($encoder->encodePassword('123', $userAdmin->getSalt()));
        $userAdmin->setEmail('312@mail.ru');
        $userAdmin->setEmailCanonical('312@mail.ru');
        $userAdmin->setEnabled(true);
        $userAdmin->addRole('ROLE_SUPER_ADMIN');
        $manager->persist($userAdmin);

        $user = new User();
        $user->setUsername('user');
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($userAdmin);
        $user->setPassword($encoder->encodePassword('123', $user->getSalt()));
        $user->setEmail('3122@mail.ru');
        $user->setEmailCanonical('3122@mail.ru');
        $user->setEnabled(true);
        $user->addRole('ROLE_DEFAULT');
        $manager->persist($user);

        $tag1 = new Tag('aaa');
        $manager->persist($tag1);

        $tag2 = new Tag('bbb');
        $manager->persist($tag2);

        $tag3 = new Tag('ccc');
        $manager->persist($tag3);

        $article = new Article();
        $article->setTitle('Simple-blog - учебный проект на симфони');
        $article->setAnnotation('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setText('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setDescription('Описание');
        $article->setUripart('Simple-blog_uchebnyi_project_na_symfony');
        $article->setKeywords('Ключ');
        $article->addTag($tag1);
        $article->addTag($tag3);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Simple-blog - учебный проект на симфони');
        $article->setAnnotation('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setText('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setDescription('Описание');
        $article->setUripart('Simple-blog_uchebnyi_project_na_symfony1');
        $article->setKeywords('Ключ');
        $article->addTag($tag1);
        $article->addTag($tag3);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Simple-blog - учебный проект на симфони');
        $article->setAnnotation('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setText('Symfony Live Portland 20Post 13: The Schedule has finally been published!
The schedule for the Symfony Live conference in Portland has just been published! Have a look at the great schedule and register now to the Symfony Live Portland 20Post 13!');
        $article->setDescription('Описание');
        $article->setUripart('Simple-blog_uchebnyi_project_na_symfony2');
        $article->setKeywords('Ключ');
        $article->addTag($tag1);
        $article->addTag($tag3);
        $manager->persist($article);


        $manager->flush();
    }
}
