<?php

declare(strict_types=1);

namespace App\Post\Handler\Command;

use App\Post\Command\PublishPost;
use App\Post\Event\PostPublished;
use App\Post\Model\Post;
use App\Post\Repository\PostRepository;
use Pandawa\Annotations\Bus\AsHandler;
use Pandawa\Contracts\Event\EventBusInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsHandler(PublishPost::class)]
final class PublishPostHandler
{
    public function __construct(
        private PostRepository $postRepository,
        private EventBusInterface $eventBus,
    ) {
    }

    public function handle(PublishPost $command): Post
    {
        $post = $this->postRepository->findById($command->postId);

        $post->published = $command->published;

        $post = $this->postRepository->save($post);

        $this->eventBus->fire(new PostPublished(
            $post->id,
            $post->title,
            $post->body,
            $post->published,
        ));

        return $post;
    }
}
