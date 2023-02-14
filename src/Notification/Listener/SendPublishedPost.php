<?php

declare(strict_types=1);

namespace App\Notification\Listener;

use App\Post\Event\PostPublished;
use Pandawa\Annotations\Event\AsListener;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsListener(PostPublished::class)]
final class SendPublishedPost
{
    public function handle(PostPublished $event): void
    {
        if (true === $event->published) {
            dump('Kirim notifikasi ke semua subscriber untuk artikel ' . $event->title);
        }
    }
}
