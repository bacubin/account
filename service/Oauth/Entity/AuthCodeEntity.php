<?php
namespace Higo\Service\Oauth\Entity;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

/**
 * Class: AuthCodeEntity
 *
 * @see AuthCodeEntityInterface
 */
class AuthCodeEntity implements AuthCodeEntityInterface
{
    use EntityTrait, AuthCodeTrait, TokenEntityTrait;
} 
