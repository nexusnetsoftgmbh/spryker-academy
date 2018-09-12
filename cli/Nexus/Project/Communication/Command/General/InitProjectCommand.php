<?php


namespace Nexus\Project\Communication\Command\General;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class InitProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:init')
            ->setDescription('Init your local environment');
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

        $response .= $this->runNexusCli('da:ge');
        $response .= $this->runNexusCli('docker:build ./env nxs-docker-dumper');
        $response .= $this->runNexusCli('docker:compose:pull docker-compose.yaml docker-local.yaml');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}