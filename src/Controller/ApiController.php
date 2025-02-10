<?php

namespace App\Controller;

use App\Entity\Likes;
use App\Entity\Posts;
use App\Entity\Reports;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/like/{postId}/{userId}', name: 'app_like_post', methods: ['POST'])]
    public function likePost(int $postId, int $userId, EntityManagerInterface $entityManager): JsonResponse
    {
        $post = $entityManager->getRepository(Posts::class)->find($postId);
        $user = $entityManager->getRepository(Users::class)->find($userId);

        if (!$post || !$user) {
            return $this->json(['error' => 'Post or User not found'], 404);
        }

        $like = new Likes();
        $like->setThePost($post);
        $like->setTheUser($user);

        $entityManager->persist($like);
        $entityManager->flush();

        return $this->json(['message' => 'Post liked successfully']);
    }

    #[Route('/report/{postId}/{userId}', name: 'app_report_post', methods: ['POST'])]
    public function reportPost(int $postId, int $userId, EntityManagerInterface $entityManager): JsonResponse
    {
        $post = $entityManager->getRepository(Posts::class)->find($postId);
        $user = $entityManager->getRepository(Users::class)->find($userId);

        if (!$post || !$user) {
            return $this->json(['error' => 'Post or User not found'], 404);
        }

        $report = new Reports();
        $report->setReportedPost($post);
        $report->setReporter($user);

        $entityManager->persist($report);
        $entityManager->flush();

        return $this->json(['message' => 'Post reported successfully']);
    }
}