<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Anniversaire;

class AnniversaireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $j = 1;
        $m = '03';
        for ($i = 0; $i < 50; $i++) {
            if ($j > 31){
                $j = 1;
                $m = '04';
            }
            $entity = new Anniversaire();
            $entity->setNom('Anniversaire ' . $i);
            $entity->setDateAnniv(new \DateTime('2024-'. ($m) .'-' . ($j)));
            $entity->setIdUser(1);
            $manager->persist($entity);
            $j +=1; 
        }

        $manager->flush();
    }
}
