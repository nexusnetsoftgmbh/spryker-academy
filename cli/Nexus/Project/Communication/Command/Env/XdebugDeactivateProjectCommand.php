<?php


namespace Nexus\Project\Communication\Command\Env;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Nexus\Project\ProjectFactory getFactory()
 */
class XdebugDeactivateProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:env:xdebug:deactivate')
            ->setDescription('De-/activate xdebug');
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

        $response .= $this->runNexusCli('docker:exec spy_php "mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.inactive"');
        $response .= $this->runNexusCli('docker:restart spy_php');

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}