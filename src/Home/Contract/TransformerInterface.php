<?php

declare(strict_types=1);

namespace App\Home\Contract;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
interface TransformerInterface
{
    public function transform(string $name): string;
}
