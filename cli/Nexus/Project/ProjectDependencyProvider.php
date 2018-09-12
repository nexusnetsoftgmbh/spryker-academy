<?php


namespace Nexus\Project;


use Nexus\Project\Communication\Command\Dumper\DumpProjectCommand;
use Nexus\Project\Communication\Command\Dumper\RestoreProjectCommand;
use Nexus\Project\Communication\Command\Env\RmProjectCommand;
use Nexus\Project\Communication\Command\Env\RunProjectCommand;
use Nexus\Project\Communication\Command\General\InitProjectCommand;
use Nexus\Project\Communication\Command\Spryker\DeployProjectCommand;
use Nexus\Project\Communication\Command\Spryker\InstallProjectCommand;
use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

class ProjectDependencyProvider extends AbstractProvider
{
    public const COMMAND_LIST = 'command.list';
    public const SHELL_FACADE = 'shell.facade';
    public const DOCKER_FACADE = 'docker.facade';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::SHELL_FACADE] = function (DependencyProviderInterface $dependencyProvider) {
            return $dependencyProvider->getLocator()->shell()->facade();
        };

        $dependencyProvider[self::DOCKER_FACADE] = function (DependencyProviderInterface $dependencyProvider) {
            return $dependencyProvider->getLocator()->dockerClient()->facade();
        };

        $dependencyProvider[self::COMMAND_LIST] = function () {
            return $this->getCommandList();
        };
    }

    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return [
            new InitProjectCommand(),
            new RunProjectCommand(),
            new RmProjectCommand(),
            new InstallProjectCommand(),
            new DeployProjectCommand()
        ];
    }

}