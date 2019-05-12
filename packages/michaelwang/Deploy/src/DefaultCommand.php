<?php


namespace Michaelwang\Deploy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DefaultCommand extends Command
{



    protected function configure()
    {

        $this
            ->setName('deploy')
            ->setDescription('Deploy cronman ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getApplication()->find('deploy:check-requirement')->run($input,$output);
        $this->getApplication()->find('deploy:configure')->run($input,$output);
    }
}