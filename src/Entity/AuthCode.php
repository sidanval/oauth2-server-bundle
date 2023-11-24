<?php

declare(strict_types=1);

namespace League\Bundle\OAuth2ServerBundle\Entity;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

final class AuthCode implements AuthCodeEntityInterface
{
    use AuthCodeTrait;
    use EntityTrait;
    use TokenEntityTrait;

    private $data;

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;

        return $this;
    }
}
