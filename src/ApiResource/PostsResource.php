<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Entity\Posts;

#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Put(),
        new Delete(),
    ]
)]
class PostsResource
{
    public ?int $id = null;
    public ?string $creatorName = null;
    public ?string $content = null;
    public ?string $tag = null;
    public ?int $likesCount = null;

    public static function fromEntity(Posts $post): self
    {
        $resource = new self();
        $resource->id = $post->getId();
        $resource->creatorName = $post->getCreator()->getName();
        $resource->content = $post->getContent();
        $resource->tag = $post->getTag();
        $resource->likesCount = count($post->getLikes());

        return $resource;
    }
}