<?php
declare(strict_types=1);

namespace Pyz\Shared\Antelope;


interface AntelopeEvents
{
    public const ENTITY_PYZ_ANTELOPE_CREATE = 'Entity.pyz_antelope.create';
    public const ENTITY_PYZ_ANTELOPE_UPDATE = 'Entity.pyz_antelope.update';
    public const ENTITY_PYZ_ANTELOPE_DELETE = 'Entity.pyz_antelope.delete';
}