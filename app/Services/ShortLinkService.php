<?php

namespace App\Services;

use App\Models\ShortLink;
use Hashids\Hashids;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ShortLinkService implements ShortLinkContract
{

    /**
     * @var HashidsInterface
     */
    private $hashService;


    public function __construct(Hashids $hashService)
    {
        $this->hashService = $hashService;

    }

    /**
     * @param string $hash
     * @return string
     */
    public function get(string $hash): string
    {
        return Cache::get($hash, function() use ($hash){
            return DB::table('short_links')->select('external_link')->where('hash', $hash)->first()->external_link;
        });
    }

    /**
     * @param string $link
     * @return string
     */
    public function generate(string $link): string
    {
        $id = DB::table('short_links')->max('id');
        $hash = $this->generateHash($id + 1);

        ShortLink::create([
            "hash" => $hash,
            "external_link" => $link
        ]);

        return route('short.links', ['hash'=>$hash]);
    }

    /**
     * @param int $id
     * @return string
     */
    protected function generateHash(int $id): string
    {
        return $this->hashService->encode($id);
    }
}
