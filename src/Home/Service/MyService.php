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
#[Injectable]
class MyService
{
    public function __construct(
        #[Inject(Type::SERVICE, 'transformer')]
        private TransformerInterface $transformerService
    ) {
    }

    public function getName(): string
    {
        return $this->transformerService->transform(request()->get('name'));
    }
}
