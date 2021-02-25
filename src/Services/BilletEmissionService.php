<?php


namespace Bradesco\Services;

use Bradesco\Interfaces\BilletAdapterInterface;
use GuzzleHttp\Client;

class BilletEmissionService
{
    public function emit(BilletAdapterInterface $billet)
    {
        $client = new Client();
        $request = $client->post('$url', [
            'json' => $billet->formatToBank(),
        ]);
        $request->getStatusCode();
    }
}
