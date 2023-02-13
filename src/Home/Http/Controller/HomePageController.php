<?php

declare(strict_types=1);

namespace App\Home\Http\Controller;

use Illuminate\Http\Response;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class HomePageController
{
    public function index(): Response
    {
        return response('Hello world');
    }
}
