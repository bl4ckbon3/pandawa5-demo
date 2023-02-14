<?php

declare(strict_types=1);

namespace App\Post\Query;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class FindDetailPost
{
    public function __construct(public string $id)
    {
    }
}
