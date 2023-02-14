<?php

declare(strict_types=1);

namespace App\Post\Observer;

use App\Post\Model\Post;
use Pandawa\Annotations\Eloquent\AsObserver;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsObserver(Post::class)]
class PostObserver
{
    public function creating(Post $post): void
    {
        $post->published = false;
    }
}
