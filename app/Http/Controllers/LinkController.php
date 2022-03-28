<?php

namespace App\Http\Controllers;

use App\Services\ShortLinkContract;
use App\Services\ShortLinkService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    /**
     * @param string $hash
     * @param \App\Services\ShortLinkService $linkService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect(string $hash, ShortLinkService $linkService)
    {
        return redirect($linkService->get($hash));
    }
}
