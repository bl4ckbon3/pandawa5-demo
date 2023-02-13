<?php

declare(strict_types=1);

namespace App\Home\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Pandawa\Annotations\Routing\AsMiddleware;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
#[AsMiddleware(name: 'set_name')]
final class SetNameMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        $request->request->set('name', 'Iqbal');

        return $next($request);
    }
}
