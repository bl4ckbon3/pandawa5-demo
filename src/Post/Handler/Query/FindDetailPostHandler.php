<?php

declare(strict_types=1);

namespace App\Post\Handler\Query;

use App\Post\Model\Post;
use App\Post\Query\FindDetailPost;
use App\Post\Repository\PostRepository;
use Pandawa\Annotations\Bus\AsHandler;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsHandler(FindDetailPost::class)]
final class FindDetailPostHandler
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function handle(FindDetailPost $query): Post
    {
        return $this->postRepository->findById($query->id);
    }
}
