<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use App\Entity\Reports;

#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Delete(),
    ]
)]
class ReportsResource
{
    public ?int $id = null;
    public ?int $postId = null;
    public ?string $reporterName = null;

    public static function fromEntity(Reports $report): self
    {
        $resource = new self();
        $resource->id = $report->getId();
        $resource->postId = $report->getReportedPost()->getId();
        $resource->reporterName = $report->getReporter()->getName();

        return $resource;
    }
}