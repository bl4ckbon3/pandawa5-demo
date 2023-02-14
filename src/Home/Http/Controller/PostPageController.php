<?php

declare(strict_types=1);

namespace App\Home\Http\Controller;

use App\Home\Service\MyService;
use App\Post\Command\CreatePost;
use App\Post\Query\FindDetailPost;
use App\Post\Repository\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Pandawa\Annotations\Routing\Routable;
use Pandawa\Annotations\Routing\Route;
use Pandawa\Contracts\Bus\BusInterface;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[Routable(prefix: '/app', routeGroup: 'api')]
class PostPageController
{
    public function __construct(
        private MyService $myService,
        private PostRepository $postRepository,
        private BusInterface $bus,
    ) {
    }

    #[Route(uri: '/posts', methods: 'GET', middleware: 'set_name')]
    public function index(): Response
    {
        $post = DB::table('posts')->first();

        return response('Title: ' . $post?->title . ', Content: ' . $post?->body);
    }

    #[Route(uri: '/posts/{post_id}', methods: 'GET', middleware: 'set_name')]
    public function show(Request $request): JsonResponse
    {
        $post = $this->bus->dispatch(
            new FindDetailPost(
                $request->route('post_id')
            )
        );

        return response()->json($post->toArray());
        //$post = $this->postRepository->findById($request->route('post_id'));

        //return response('Title: ' . $post?->title . ', Content: ' . $post->body);
    }

    #[Route(uri: '/posts', methods: 'POST')]
    public function store(Request $request): JsonResponse
    {
        $post = $this->bus->dispatch(
            new CreatePost(
                $request->get('title'),
                $request->get('body')
            )
        );

        return response()->json($post->toArray());
    }
}
