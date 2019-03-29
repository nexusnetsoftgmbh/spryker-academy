<?php


namespace Nexus\Project;


use Nexus\Project\Communication\Command\Dumper\DumpProjectCommand;
use Nexus\Project\Communication\Command\Dumper\RestoreProjectCommand;
use Nexus\Project\Communication\Command\Env\RmProjectCommand;
use Nexus\Project\Communication\Command\Env\RunProjectCommand;
use Nexus\Project\Communication\Command\Env\XdebugDeactivateProjectCommand;
use Nexus\Project\Communication\Command\Env\XdebugProjectCommand;
use Nexus\Project\Communication\Command\General\InitProjectCommand;
use Nexus\Project\Communication\Command\Spryker\ConsoleProjectCommand;
use Nexus\Project\Communication\Command\Spryker\DeployProjectCommand;
use Nexus\Project\Communication\Command\Spryker\InstallProjectCommand;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class ProjectDependencyProvider extends AbstractDependencyProvider
{
    public const COMMAND_LIST = 'command.list';
    public const SHELL_FACADE = 'shell.facade';
    public const DOCKER_FACADE = 'docker.facade';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::SHELL_FACADE] = function (DependencyContainerInterface $container) {
            return $container->getLocator()->shell()->facade();
        };

        $container[self::DOCKER_FACADE] = function (DependencyContainerInterface $container) {
            return $container->getLocator()->dockerClient()->facade();
        };

        $container[self::COMMAND_LIST] = function () {
            return $this->getCommandList();
        };

        return $container;
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
            new ConsoleProjectCommand(),
            new DeployProjectCommand(),
            new DumpProjectCommand(),
            new RestoreProjectCommand(),
            new XdebugProjectCommand(),
            new XdebugDeactivateProjectCommand()
        ];
    }

}