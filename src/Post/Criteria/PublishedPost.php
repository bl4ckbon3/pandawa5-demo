<?php

declare(strict_types=1);

namespace App\Post\Criteria;

use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Pandawa\Contracts\Eloquent\CriterionInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class PublishedPost implements CriterionInterface
{
    public function __construct(private mixed $published = null)
    {

    }

    public function apply(QueryBuilder|EloquentBuilder $query): void
    {
        if (null !== $this->published) {
            $query->where('published', $this->published);
        }
    }
}
