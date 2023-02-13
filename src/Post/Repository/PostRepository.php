<?php

declare(strict_types=1);

namespace App\Post\Repository;

use App\Post\Model\Post;
use Pandawa\Annotations\Eloquent\AsRepository;
use Pandawa\Component\Eloquent\Repository;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsRepository(Post::class)]
class PostRepository extends Repository
{
}
