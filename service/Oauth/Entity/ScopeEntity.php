<?php
namespace Higo\Service\Oauth\Entity;

use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * Class: ScopeEntity
 *
 * @see ScopeEntityInterface
 */
class ScopeEntity implements ScopeEntityInterface
{
    use EntityTrait;

    /**
     * jsonSerialize
     *
     */
    public function jsonSerialize()
    {
        return $this->getIdentifier();
    }
}
