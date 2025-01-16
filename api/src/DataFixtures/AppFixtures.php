<?php

namespace Api\DataFixtures;

use Api\Entity\Activity;
use Api\Entity\User;
use Api\Entity\Invitation;
use Api\Entity\Group;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\AsciiSlugger;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function loadUsers(ObjectManager $manager): void {
        for ($i = 0; $i <= 100 ; ++$i) {
            $user = new User();
            $faker = Factory::create();
            $slugger = new AsciiSlugger();

            $userFirstname = $faker->firstName();
            $userLastname = $faker->lastName();
            $username = $faker->userName();
            $email = strtolower($slugger->slug($username)).'@'.$faker->freeEmailDomain();

            $hashedPassword = $this->passwordHasher->hashPassword($user, 'userPassword');

            $user->setFirstname($userFirstname);
            $user->setLastname($userLastname);
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($hashedPassword);
            $user->setSignUpDate($faker->dateTimeBetween('-6 months', '-5 days'));

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function loadGroups(ObjectManager $manager) {
        for($i = 0; $i <= 15; ++$i) {

            $group = new Group();
            $faker = Factory::create();
            $slugger = new AsciiSlugger();

            $groupName = $faker->words(rand(3, 8), true);
            $groupDescription = $faker->paragraphs(rand(1,3), true);

            $group->setUuid($faker->uuid());
            $group->setName($groupName);
            $group->setDescription($groupDescription);
            $group->setCreatedAt($faker->dateTimeBetween('-6 months', '-4 days'));
            $group->setUpdatedAt($faker->dateTimeBetween('-5 months', '-1 day'));

            $manager->persist($group);
        }
    }

//    public function loadActivities() {}

//    public function loadInvitations(){}


    public function load(ObjectManager $manager): void
    {
        $this->loadUsers($manager);
        $this->loadGroups($manager);
    }
}
