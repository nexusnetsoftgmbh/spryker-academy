<?php


namespace Nexus\Project\Business;


use Nexus\DockerClient\Business\DockerClientFacadeInterface;
use Nexus\Project\ProjectDependencyProvider;
use Nexus\Shell\Business\ShellFacadeInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

class ProjectBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return array
     */
    public function getCommandList(): array
    {
        return $this->getDependency(ProjectDependencyProvider::COMMAND_LIST);
    }

    /**
     * @return \Nexus\Shell\Business\ShellFacadeInterface
     */
    public function getShellFacade(): ShellFacadeInterface
    {
        return $this->getDependency(ProjectDependencyProvider::SHELL_FACADE);
    }

    /**
     * @return \Nexus\DockerClient\Business\DockerClientFacadeInterface
     */
    public function getDockerFacade(): DockerClientFacadeInterface
    {
        return $this->getDependency(ProjectDependencyProvider::DOCKER_FACADE);
    }
}