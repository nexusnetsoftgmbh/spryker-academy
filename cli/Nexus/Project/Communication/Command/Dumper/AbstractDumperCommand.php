<?php


namespace Nexus\Project\Communication\Command\Dumper;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;

abstract class AbstractDumperCommand extends AbstractNexusCliCommand
{
    /**
     * @param string $type
     * @param string $command
     *
     * @return string
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function dump(string $type, string $volume, string $path, string $version): string
    {
        return $this->dumper(
            $type,
            'dump',
            $volume,
            $path,
            $version
        );
    }

    /**
     * @param string $type
     * @param string $command
     *
     * @return string
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function restore(string $type, string $volume, string $path, string $version): string
    {
        return $this->dumper(
            $type,
            'restore',
            $volume,
            $path,
            $version
        );
    }

    /**
     * @param string $type
     * @param string $command
     *
     * @return string
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    private function dumper(string $type, string $command, string $volume, string $path, string $version): string
    {
        return $this->runNexusCli(
            sprintf(
                'dumper:%s:%s %s %s %s',
                $command,
                $type,
                $volume,
                $path,
                $version
            )
        );
    }
}