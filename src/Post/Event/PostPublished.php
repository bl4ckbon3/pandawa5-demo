<?php

declare(strict_types=1);

namespace App\Post\Event;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class PostPublished
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $body,
        public readonly bool $published,
    ) {
    }
}
