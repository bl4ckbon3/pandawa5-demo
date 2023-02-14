<?php

declare(strict_types=1);

namespace App\Post\Model;

use App\Post\Criteria\PublishedPost;
use Pandawa\Annotations\Resource\ApiResource;
use Pandawa\Component\Eloquent\Model;
use Pandawa\Component\Resource\Criteria\Filter;
use Pandawa\Component\Resource\Criteria\OrderBy;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[ApiResource(
    uri: '/posts',
    routeGroup: 'api',
    //only: ['index', 'show', 'delete', 'store'],
    options: [
        'index' => [
            'paginate' => 5,
            'criteria' => [
                [
                    'class'   => OrderBy::class,
                    'values' => [
                        'order_fields'  => ['id', 'updated_at', 'created_at'],
                        'default_order' => ['updated_at' => 'desc'],
                    ],
                ],
                [
                    'class'   => Filter::class,
                    'values' => [
                        'filters'  => [
                            'published' => 'exact',
                            'title' => 'contains',
                            'body' => 'contains',
                        ],
                    ],
                ],
            ],
        ],
    ]
)]
#[ApiResource(
    uri: '/published-posts',
    routeName: 'published-posts',
    routeGroup: 'api',
    only: ['index'],
    options: [
        'index' => [
            'criteria' => [
                [
                    'class' => PublishedPost::class,
                    'arguments' => ['published'],
                ]
            ]
        ]
    ]
)]
class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    protected $casts = [
        'published' => 'bool',
    ];
}
