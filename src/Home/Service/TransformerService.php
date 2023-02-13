<?php

declare(strict_types=1);

namespace App\Home\Service;

use App\Home\Contract\TransformerInterface;
use Pandawa\Annotations\DependencyInjection\Inject;
use Pandawa\Annotations\DependencyInjection\Injectable;
use Pandawa\Annotations\DependencyInjection\Type;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Injectable(alias: ['transformer'])]
class TransformerService implements TransformerInterface
{
    public function __construct(
        #[Inject(Type::CONFIG, 'home.prefix')]
        private string $prefix
    ) {
    }

    public function transform(string $name): string
    {
        return $this->prefix . $name;
    }
}
