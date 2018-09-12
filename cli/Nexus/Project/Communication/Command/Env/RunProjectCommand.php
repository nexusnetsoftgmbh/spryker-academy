<?php


namespace Nexus\Project\Communication\Command\Env;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class RunProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:env:run')
            ->setDescription('Run your local environment');
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

        $response .= $this->runNexusCli('docker:volume:create projectdata dbdata elasticdata redisdata');
        $response .= $this->runNexusCli('docker:compose:up docker-compose.yaml docker-local.yaml');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}