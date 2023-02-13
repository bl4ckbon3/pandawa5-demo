<?php

declare(strict_types=1);

namespace App\Home\Http\Controller;

use App\Home\Service\MyService;
use App\Post\Model\Post;
use App\Post\Repository\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Pandawa\Annotations\Routing\Routable;
use Pandawa\Annotations\Routing\Route;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Routable(prefix: '/app', routeGroup: 'api')]
class PostPageController
{
    public function __construct(
        private MyService $myService,
        private PostRepository $postRepository,
    ) {
    }

    #[Route(uri: '/posts', methods: 'GET', middleware: 'set_name')]
    public function index(): Response
    {
        $post = DB::table('posts')->first();

        return response('Title: ' . $post?->title . ', Content: ' . $post?->body);
    }

    #[Route(uri: '/posts/{post_id}', methods: 'GET', middleware: 'set_name')]
    public function show(Request $request): Response
    {
        $post = $this->postRepository->findById($request->route('post_id'));

        return response('Title: ' . $post?->title . ', Content: ' . $post->body);
    }
}
