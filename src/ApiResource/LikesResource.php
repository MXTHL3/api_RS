<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use App\Entity\Likes;

#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Delete(),
    ]
)]
class LikesResource
{
    public ?int $id = null;
    public ?int $postId = null;
    public ?string $userName = null;

    public static function fromEntity(Likes $like): self
    {
        $resource = new self();
        $resource->id = $like->getId();
        $resource->postId = $like->getThePost()->getId();
        $resource->userName = $like->getTheUser()->getName();

        return $resource;
    }
}