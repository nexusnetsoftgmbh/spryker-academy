<?php
declare(strict_types=1);

namespace Nexus\Project\Business;


use Xervice\Core\Business\Model\Facade\AbstractFacade;

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