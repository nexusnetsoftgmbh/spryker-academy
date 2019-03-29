<?php


namespace Nexus\Project\Communication\Command;


use Xervice\Console\Business\Model\Command\AbstractCommand;

/**
 * @method \Nexus\Project\Communication\ProjectCommunicationFactory getFactory()
 */
abstract class AbstractNexusCliCommand extends AbstractCommand
{
    /**
     * @param string $command
     * @param mixed ...$params
     *
     * @return string
     */
    protected function runNexusCli(string $command, ...$params)
    {
        $command = sprintf(
            'php %s/cli/nxscli.php %s',
            getcwd(),
            sprintf(
                $command,
                ...$params
            )
        );

        return $this->getFactory()->getShellFacade()->runCommand($command);
    }
}