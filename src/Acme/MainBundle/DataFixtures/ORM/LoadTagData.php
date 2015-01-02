<?php

namespace Acme\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\MainBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 5; $i++) {
                $tag = new Tag();
                $tag->setTag('Tag ' .$i);
                $tag->setIsPublished(rand(0, 1));
                $tag->addBlog($this->getReference('blogid'.$i));

                $manager->persist($tag);
                $manager->flush();

                $this->addReference('tagid'.$i, $tag);
            }
        }

        /**
         * {@inheritDoc}
         */
        public function getOrder() {
            return 2; // the order in which fixtures will be loaded
        }

    }
    