<?php

declare(strict_types=1);

namespace App\Post\Command;

use Pandawa\Annotations\Bus\AsMessage;
use Pandawa\Annotations\Resource\ApiMessage;
use Pandawa\Component\Bus\Stamp\DatabaseTransactionStamp;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[ApiMessage(
    uri: '/posts/{post_id}/publish',
    methods: 'PATCH',
    routeGroup: 'api',
    options: [
        'rules' => [
            [
                'constraints' => [
                    'post_id'   => 'required|int',
                    'published' => 'required|boolean',
                ],
                'messages' => [
                    'published.required' => 'Parameter published harus diisi.',
                    'published.boolean' => 'Parameter published harus boolean.',
                ]
            ],
        ],
    ]
)]
#[AsMessage(
    stamps: [
        ['class' => DatabaseTransactionStamp::class],
    ]
)]
class PublishPost
{
    public function __construct(
        public readonly string $postId,
        public readonly bool $published,
    ) {
    }
}
