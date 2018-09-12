<?php


namespace Nexus\Project;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Project\Project\ProjectFactory getFactory()
 */
class ProjectFacade extends AbstractFacade
{
    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->getFactory()->getCommandList();
    }
}