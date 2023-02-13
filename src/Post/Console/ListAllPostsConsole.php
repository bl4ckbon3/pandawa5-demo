<?php

declare(strict_types=1);

namespace App\Post\Console;

use App\Post\Repository\PostRepository;
use Illuminate\Console\Command;
use Pandawa\Annotations\Console\AsConsole;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsConsole]
class ListAllPostsConsole extends Command
{
    public $signature = 'post:list';

    public function handle(PostRepository $postRepository): void
    {
        foreach ($postRepository->findAll() as $post) {
            $this->info('Post: ' . $post->title);
        }
    }
}
