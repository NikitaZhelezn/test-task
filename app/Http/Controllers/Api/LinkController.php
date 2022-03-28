<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Services\ShortLinkService;

class LinkController extends Controller
{
    //
    public function generate(StoreLinkRequest $request, ShortLinkService $linkService)
    {

        try {
            $shortLink = $linkService->generate($request->get('link'));
            return response()->json(['shortLink' => $shortLink], 201);

        } catch (\Throwable $exception) {
            return response()->json('', 400);
        }

    }
}
