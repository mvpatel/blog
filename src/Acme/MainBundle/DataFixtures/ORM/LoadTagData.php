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
            $tag->setTag('Tag ' . $i);
            $tag->setIsPublished(true);

            $manager->persist($tag);
            $manager->flush();

            $this->addReference('tagid' . $i, $tag);
        }
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }

}
