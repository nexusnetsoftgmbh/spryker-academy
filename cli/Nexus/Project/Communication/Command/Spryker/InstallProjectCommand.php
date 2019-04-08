<?php


namespace Nexus\Project\Communication\Command\Spryker;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:spryker:install')
            ->setDescription('Prepare and install spryker');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = '';

        $response .= $this->runNexusCli('spryker:rabbitmq:addstore DE development mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:rabbitmq:addstore DE devtest mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:rabbitmq:addstore AT development mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:rabbitmq:addstore AT devtest mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:rabbitmq:addstore US development mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:rabbitmq:addstore US devtest mate20mg spy_rabbitmq -vvv');
        $response .= $this->runNexusCli('spryker:install "-r development" "spy_php" "-vvv"');
        $response .= $this->runNexusCli('docker:exec spy_php "chown -Rf www-data:www-data /data" -vvv');
        $response .= $this->runNexusCli('docker:exec spy_php "chmod -Rf 0777 /data/shop/development/current/data" -vvv');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}