<?php


namespace Michaelwang\Deploy;

use Dotenv\Dotenv;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use PDO;

class ConfigureCommand extends Command
{

    protected $mandatoryOptions = [
      'APP_DOMAIN',
      'API_DOMAIN',
      'DB_HOST',
      'DB_PORT',
      'DB_USERNAME',
      'DB_PASSWORD',
      'DB_DATABASE'
    ];


    public function __construct($name = null)
    {
        parent::__construct($name);

    }

    protected function configure()
    {

        $this
            ->setName('deploy:configure')
            ->setDescription('Configure mandatory options for cronman')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // make sure .env file exists
        if(file_exists('.env')){
            $output->writeln([
               '<info>.env file exists!</info>'
            ]);
        }else{
            $output->writeln([
                '.env is not found.',
                'Generate .env file from sample file'
            ]);
            copy('.env.example','.env');
        }
        // load env
        $dotenv = new Dotenv('./');
        $dotenv->load();

        // configure mandatory options
        $helper  = $this->getHelper('question');
        $dbHost = $helper->ask($input, $output, new Question("Please enter Database hostname: (localhost) ","localhost"));
        $dbPort = $helper->ask($input, $output, new Question("Please enter Database port: (3306) ","3306"));
        $dbUser = $helper->ask($input, $output, new Question("Please enter Database username: (root) ","root"));
        $dbPass = $helper->ask($input, $output, new Question("Please enter Database password: (vagrant) ","vagrant"));
        $dbName = $helper->ask($input, $output, new Question("Please enter Database name: (cronman) ","cronman"));

        $usingApiPrefix = $helper->ask($input, $output, new ConfirmationQuestion("Do you use API prefix for CRONMAN API ? ",false));
        if($usingApiPrefix){
            $apiPrefix = $helper->ask($input, $output, new Question("Please enter prefix name: (api) ","api"));
            setenv('.env','API_PREFIX',$apiPrefix);
        }else{
            setenv('.env','API_PREFIX','');
        }
        $appDomain = $helper->ask($input, $output, new Question("Please enter domain name for UI: (demo.cronman.ntc.zone) ","demo.cronman.ntc.zone"));
        $apiDomain = $helper->ask($input, $output, new Question("Please enter domain name for API: (demo.api.cronman.ntc.zone) ","demo.api.cronman.ntc.zone"));
        setenv('.env','DB_HOST',$dbHost);
        setenv('.env','DB_PORT',$dbPort);
        setenv('.env','DB_USERNAME',$dbUser);
        setenv('.env','DB_PASSWORD',$dbPass);
        setenv('.env','DB_DATABASE',$dbName);
        setenv('.env','APP_DOMAIN',$appDomain);
        setenv('.env','API_DOMAIN',$apiDomain);

        //create database if not exists
        try {
            $conn = new PDO("mysql:host=".$dbHost, $dbUser, $dbPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS {$dbName}";
            $conn->exec($sql);
            $output->writeln([
                "<info>Database $dbName created!</info>"
            ]);
        }
        catch(PDOException $e)
        {
            $output->writeln([
               [
                   '<error>'.$e->getMessage().'</error>'
               ]
            ]);
        }

    }




}