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

class AgentCommand extends Command
{

    protected $agentWorkingDir;

    protected $agentPackageUrl;


    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->agentWorkingDir = exec('pwd').DIRECTORY_SEPARATOR.env('AGENT_WORKING_DIR','agent');
        $this->agentPackageUrl = 'https://s3-ap-southeast-1.amazonaws.com/neptune-cronman-stage/opsworks/applications/cronman-agent/stage/cronman-agent-latest.zip';
    }

    protected function configure()
    {

        $this
            ->setName('agent:deploy')
            ->setDescription('Download and deploy local agent in cronman ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = 'wget '.$this->agentPackageUrl.' -O agent.zip && unzip -o  agent.zip -d  '.$this->agentWorkingDir;
        $msg = shell_exec($cmd);
        $output->writeln([
           $msg,
           '<info>Configuring   agent running options </info>'
        ]);

        // run setup
        $setup = 'sh '.$this->agentWorkingDir.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'setup.sh';
        $output->writeln([
            shell_exec($setup),
            '<info>Removing agent.zip. </info>'
        ]);
        shell_exec('rm -rf agent.zip');
    }
}