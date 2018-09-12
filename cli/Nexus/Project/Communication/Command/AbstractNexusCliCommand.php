<?php


namespace Nexus\Project\Communication\Command;


use Xervice\Console\Command\AbstractCommand;

abstract class AbstractNexusCliCommand extends AbstractCommand
{
    /**
     * @param string $command
     * @param mixed ...$params
     *
     * @return string
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
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