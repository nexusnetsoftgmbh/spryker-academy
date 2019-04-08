<?php


namespace Nexus\Project\Communication\Command\Env;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class RunMbxProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:env:mbx:run')
            ->setDescription('Run your local environment with local volumes and without open ports');
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

        $response .= $this->runNexusCli('docker:volume:create spy_projectdata spy_dbdata spy_elasticdata spy_redisdata');
        $response .= $this->runNexusCli('docker:compose:up docker-compose.yaml docker-volumes.yaml docker-mbx.yaml');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}