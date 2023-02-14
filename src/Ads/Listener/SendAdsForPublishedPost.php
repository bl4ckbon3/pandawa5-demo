<?php

declare(strict_types=1);

namespace App\Ads\Listener;

use App\Post\Event\PostPublished;
use Pandawa\Annotations\Event\AsListener;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsListener(PostPublished::class)]
class SendAdsForPublishedPost
{
    public function handle(PostPublished $event): void
    {
        if ($event->published) {
            dump('Kirim iklan ke INSTAGRAM untuk artikel ' . $event->title);
        }
    }
}
