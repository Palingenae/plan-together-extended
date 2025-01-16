<?php

namespace Api\DataFixtures;

use Api\Entity\Activity;
use Api\Entity\User;
use Api\Entity\Invitation;
use Api\Entity\Group;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;