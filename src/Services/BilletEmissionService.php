<?php


namespace Bradesco\Services;

use Bradesco\Models\Billet;
use GuzzleHttp\Client;

class BilletEmissionService
{
    public function emit(Billet $billet)
    {
        $client = new Client();
        $request = $client->post('$url', [
            'json' => $billet->toArray(),
        ]);
        $request->getStatusCode();
    }
}
