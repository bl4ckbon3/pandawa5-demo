<?php

declare(strict_types=1);

namespace App\Post\Handler\Command;

use App\Post\Command\CreatePost;
use App\Post\Model\Post;
use App\Post\Repository\PostRepository;
use Pandawa\Annotations\Bus\AsHandler;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsHandler(CreatePost::class)]
final class CreatePostHandler
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function handle(CreatePost $command): Post
    {
        return $this->postRepository->save(
            new Post(['title' => $command->title, 'body' => $command->content])
        );
    }
}
