<?php

namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DepartmentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $departmentNames = ['Direction', 'Ressources Humaines', 'Communication', 'Marketing'];

        foreach ($departmentNames as $name) {
            $department = new Department();
            $department->setName($name);
            $department->setManager($this->getReference($name));
            $manager->persist($department);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
