<?php

declare(strict_types=1);

namespace App\Home;

use Pandawa\Bundle\DependencyInjectionBundle\Plugin\ImportInjectableAnnotationPlugin;
use Pandawa\Bundle\DependencyInjectionBundle\Plugin\ImportServicesPlugin;
use Pandawa\Bundle\FoundationBundle\Plugin\ImportConfigurationPlugin;
use Pandawa\Bundle\RoutingBundle\Plugin\ImportMiddlewareAnnotationPlugin;
use Pandawa\Bundle\RoutingBundle\Plugin\ImportRouteAnnotationPlugin;
use Pandawa\Bundle\RoutingBundle\Plugin\ImportRoutesPlugin;
use Pandawa\Component\Foundation\Bundle\Bundle;
use Pandawa\Contracts\Foundation\HasPluginInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HomeBundle extends Bundle implements HasPluginInterface
{
    public function plugins(): array
    {
        return [
            new ImportConfigurationPlugin(),
            new ImportRoutesPlugin(),
            new ImportInjectableAnnotationPlugin(),
            //new ImportServicesPlugin(),
            new ImportRouteAnnotationPlugin(),
            new ImportMiddlewareAnnotationPlugin(),
        ];
    }
}
