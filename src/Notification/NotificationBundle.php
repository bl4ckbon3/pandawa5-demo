<?php

declare(strict_types=1);

namespace App\Notification;

use Pandawa\Bundle\EventBundle\Plugin\ImportEventListenerAnnotationPlugin;
use Pandawa\Component\Foundation\Bundle\Bundle;
use Pandawa\Contracts\Foundation\HasPluginInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class NotificationBundle extends Bundle implements HasPluginInterface
{
    public function plugins(): array
    {
        return [
            new ImportEventListenerAnnotationPlugin(),
        ];
    }
}
