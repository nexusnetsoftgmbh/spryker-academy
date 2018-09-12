<?php


namespace Nexus\Project;


use Nexus\DockerClient\DockerClientFacade;
use Nexus\Shell\ShellFacade;
use Xervice\Core\Factory\AbstractFactory;

class ProjectFactory extends AbstractFactory
{
    /**
     * @return \Nexus\Shell\ShellFacade
     */
    public function getShellFacade(): ShellFacade
    {
        return $this->getDependency(ProjectDependencyProvider::SHELL_FACADE);
    }

    /**
     * @return \Nexus\DockerClient\DockerClientFacade
     */
    public function getDockerFacade(): DockerClientFacade
    {
        return $this->getDependency(ProjectDependencyProvider::DOCKER_FACADE);
    }

    /**
     * @return array
     */
    public function getCommandList(): array
    {
        return $this->getDependency(ProjectDependencyProvider::COMMAND_LIST);
    }
}