<?php


namespace Nexus\Project\Communication\Command\Dumper;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class RestoreProjectCommand extends AbstractDumperCommand
{
    protected function configure()
    {
        $this
            ->setName('project:restore')
            ->setDescription('Restore your project files')
            ->addArgument('type', InputArgument::OPTIONAL, 'Source from where to restore', 'local');
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
        $type = $input->getArgument('type');

        $response = '';

        $response .= $this->getFactory()->getDockerFacade()->runDocker('stop spy_db');
        $response .= $this->getFactory()->getDockerFacade()->runDocker('stop spy_redis');
        $response .= $this->getFactory()->getDockerFacade()->runDocker('stop spy_elasticsearch');

        $response .= $this->restore($type, 'spy_projectdata', '/data', 'spy_project');
        $response .= $this->restore($type, 'spy_dbdata', '/var/lib/postgresql/data', 'spy_db');
        $response .= $this->restore($type, 'spy_redisdata', '/data', 'spy_redis');
        $response .= $this->restore($type, 'spy_elasticdata', '/usr/share/elasticsearch/data', 'spy_elasticsearch');

        $response .= $this->getFactory()->getDockerFacade()->runDocker('start spy_db');
        $response .= $this->getFactory()->getDockerFacade()->runDocker('start spy_redis');
        $response .= $this->getFactory()->getDockerFacade()->runDocker('start spy_elasticsearch');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }



}