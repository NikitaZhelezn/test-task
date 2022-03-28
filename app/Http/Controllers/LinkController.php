<?php

namespace App\Http\Controllers;

use App\Services\ShortLinkContract;
use App\Services\ShortLinkService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    public function redirect(string $hash, ShortLinkService $linkService)
    {
        return redirect($linkService->get($hash));
    }
}
