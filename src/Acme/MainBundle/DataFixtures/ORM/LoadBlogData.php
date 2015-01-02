<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Blog;

class LoadBlogData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 50; $i++) {
            $blog = new Blog();
            $blog->setTitle('Blog Post '.$i);
            $blog->setSubTitle('Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.');
            $blog->setAuthor('Author '.$i);
            $blog->setCreatedAt(new \DateTime('now'));
            $blog->setUpdatedAt(new \DateTime('now'));
            $blog->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)");
            $blog->setIsPublished(true);
            $blog->addTag($this->getReference('tagid' . rand(1,3)));
            $blog->addTag($this->getReference('tagid' . rand(4,5)));

            $manager->persist($blog);
            $manager->flush();

            $this->addReference('blogid'.$i, $blog);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }

}
