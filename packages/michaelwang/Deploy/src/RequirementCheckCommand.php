<?php


namespace Michaelwang\Deploy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RequirementCheckCommand extends Command
{

    protected $ext = [
        'zip',
        'pdo',
        'tokenizer',
        'mbstring',
        'xml',
        'xmlrpc',

    ];

    protected function configure()
    {

        $this
            ->setName('deploy:check-requirement')
            ->setDescription('Check current enviorment whether meet cronman server minimal requirement')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
          [
              'Starting checking requirement',
              '....',
              '',
          ]
        );
        $version = phpversion();
        if($version > '5.6.4'){
            $output->writeln(
                [
                    "PHP version is $version,<info>✓</info>",
                ]
            );
        }else{
            $output->writeln(
                [
                    "PHP version is $version, less than 5.6.4, <error> X</error>",
                ]
            );
        }

        array_walk($this->ext,function($ext) use ($output) {
            $msg =  extension_loaded($ext) ? "$ext intalled, <info> ✓</info>" : "$ext is not found,<error>X</error>";
            $output->writeln([
                $msg
            ]);
        });

    }
}