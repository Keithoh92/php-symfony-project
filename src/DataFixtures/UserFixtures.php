<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
     private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();


        $admin = new User();
        $admin->setUsername('Keith');
//        $admin->setFirstname('Keith');
//        $admin->setSurname('O Hare');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'admin'
        ));
//        $admin->setEmail('Joe@hotmail.com');
        $admin->setRoles(['ROLE_ADMIN']);


        $manager->persist($admin);


        $numberOfUsers = 10;
        for ($i = 0; $i < $numberOfUsers; $i++) {
            $username = $faker->userName;
//            $firstname = $faker->firstName;
//            $surname = $faker->lastName;
            $password = $faker->password;
//            $email = $faker->email;


            $user = new User();
            $user->setUsername($username);
//            $user->setFirstname($firstname);
//            $user->setSurname($surname);
            $user->setPassword($password);
//            $user->setEmail($email);
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }

        $user1= new User();
        $user1->setUsername('Jack');
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'jack'
        ));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $manager->flush();
    }
}
