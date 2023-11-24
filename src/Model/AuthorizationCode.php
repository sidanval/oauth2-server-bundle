<?php

declare(strict_types=1);

namespace League\Bundle\OAuth2ServerBundle\Model;

use League\Bundle\OAuth2ServerBundle\ValueObject\Scope;

class AuthorizationCode implements AuthorizationCodeInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var \DateTimeInterface
     */
    private $expiry;

    /**
     * @var string|null
     */
    private $userIdentifier;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var list<Scope>
     */
    private $scopes = [];

    /**
     * @var bool
     */
    private $revoked = false;

    private $data = [];

    /**
     * @param list<Scope> $scopes
     *
     * @psalm-mutation-free
     */
    public function __construct(
        string $identifier,
        \DateTimeInterface $expiry,
        ClientInterface $client,
        ?string $userIdentifier,
        array $scopes,
        array $data
    ) {
        $this->identifier = $identifier;
        $this->expiry = $expiry;
        $this->client = $client;
        $this->userIdentifier = $userIdentifier;
        $this->scopes = $scopes;
        $this->data = $data;
    }

    /**
     * @psalm-mutation-free
     */
    public function __toString(): string
    {
        return $this->getIdentifier();
    }

    /**
     * @psalm-mutation-free
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @psalm-mutation-free
     */
    public function getExpiryDateTime(): \DateTimeInterface
    {
        return $this->expiry;
    }

    /**
     * @psalm-mutation-free
     */
    public function getUserIdentifier(): ?string
    {
        return $this->userIdentifier;
    }

    /**
     * @psalm-mutation-free
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @return list<Scope>
     *
     * @psalm-mutation-free
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @psalm-mutation-free
     */
    public function isRevoked(): bool
    {
        return $this->revoked;
    }

    public function revoke(): AuthorizationCodeInterface
    {
        $this->revoked = true;

        return $this;
    }
}
