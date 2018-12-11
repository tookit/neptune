<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 11/15/17
 * Time: 3:17 PM
 */

namespace Michaelwang\Deploy;

use Dotenv\Dotenv;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class VersionCommand extends Command
{




    public function __construct($name = null)
    {
        parent::__construct($name);

    }

    protected function configure()
    {

        $this
            ->setName('version')
            ->setDescription('Versioning cronman system ')
            ->addArgument('version', InputArgument::REQUIRED,'The version number of cronman')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dotenv = new Dotenv('./');
        $dotenv->load();
        $version = $input->getArgument('version') ? $input->getArgument('version') : shell_exec('cat version');
        $files = glob(".env*example");
        array_walk($files,function($file) use($version,$output) {
            setenv($file,'VERSION',$version);
            $output->writeln(
                [
                    "$file version updated,<info>✓</info>",
                ]
            );
        });

        file_put_contents("version",$version);
        $output->writeln(
            [
                "version file updated,<info>✓</info>",
            ]
        );

    }
}