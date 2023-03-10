<?php

declare(strict_types=1);

namespace App\Post;

use Pandawa\Bundle\BusBundle\Plugin\ImportBusAnnotationPlugin;
use Pandawa\Bundle\ConsoleBundle\Plugin\ImportConsolePlugin;
use Pandawa\Bundle\DatabaseBundle\Plugin\ImportMigrationPlugin;
use Pandawa\Bundle\EloquentBundle\Plugin\ImportObserverAnnotationPlugin;
use Pandawa\Bundle\EloquentBundle\Plugin\ImportRepositoryAnnotationPlugin;
use Pandawa\Bundle\ResourceBundle\Plugin\ImportResourceAnnotationPlugin;
use Pandawa\Component\Foundation\Bundle\Bundle;
use Pandawa\Contracts\Foundation\HasPluginInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class PostBundle extends Bundle implements HasPluginInterface
{
    public function plugins(): array
    {
        return [
            new ImportMigrationPlugin(),
            new ImportRepositoryAnnotationPlugin(),
            new ImportConsolePlugin(),
            new ImportBusAnnotationPlugin(),
            new ImportResourceAnnotationPlugin(),
            new ImportObserverAnnotationPlugin(),
        ];
    }
}
