<?php

declare(strict_types=1);

namespace League\Bundle\OAuth2ServerBundle\Model;

interface AccessTokenInterface
{
    public function __toString(): string;

    public function getIdentifier(): string;

    public function getExpiry(): \DateTimeInterface;

    public function getUserIdentifier(): ?string;

    public function getClient(): ClientInterface;

    public function getScopes(): array;

    public function isRevoked(): bool;

    public function revoke(): self;
}
