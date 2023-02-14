<?php

declare(strict_types=1);

namespace App\Post\Command;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class CreatePost
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
    ) {
    }
}
