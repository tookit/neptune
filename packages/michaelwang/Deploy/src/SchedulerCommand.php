<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 11/15/17
 * Time: 3:17 PM
 */

namespace Michaelwang\Deploy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SchedulerCommand extends Command
{



    protected function configure()
    {

        $this
            ->setName('scheduler:deploy')
            ->setDescription('Download and deploy local agent in cronman ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}