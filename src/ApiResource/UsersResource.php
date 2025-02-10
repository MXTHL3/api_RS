<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Entity\Users;

#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Put(),
        new Delete(),
    ]
)]
class UsersResource
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $mailAddress = null;
    public ?bool $isAdmin = null;

    public static function fromEntity(Users $user): self
    {
        $resource = new self();
        $resource->id = $user->getId();
        $resource->name = $user->getName();
        $resource->mailAddress = $user->getMailAddress();
        $resource->isAdmin = $user->isAdmin();

        return $resource;
    }
}