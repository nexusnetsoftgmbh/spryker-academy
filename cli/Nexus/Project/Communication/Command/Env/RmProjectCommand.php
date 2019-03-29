<?php


namespace Nexus\Project\Communication\Command\Env;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class RmProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:env:rm')
            ->setDescription('Remove your local environment');
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

        $response .= $this->runNexusCli('docker:compose:rm docker-compose.yaml docker-local.yaml');
        $response .= $this->runNexusCli('docker:volume:rm spy_projectdata spy_dbdata spy_elasticdata spy_redisdata');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}