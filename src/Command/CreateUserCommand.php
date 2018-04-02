<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'user:create';

    protected function configure()
    {
        $this
            ->setDescription('Create user with specified name and password')
            ->addArgument('username', InputArgument::REQUIRED, 'User name')
            ->addArgument('password', InputArgument::REQUIRED, 'Password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $userName = $input->getArgument('username');
        $password = $input->getArgument('password');

        // TODO: use form
        $user = new User();
        $user->setUsername($userName);
        $user->setPassword($password);

        /** @var EntityManager $entityManager */
        $entityManager = $this->getContainer()->get('doctrine')->getManager();
        $entityManager->flush($user);


        $io->success(sprintf('User "%s" successfully created.', $user->getUsername()));
    }
}
