<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;

class SignatureService
{

    static public function createSignature($signature): array
    {
        if ($signature instanceof Signature) {
            $signature = $signature->toArray();
        }
        return [
            $signature['verb'],
            $signature['uri'],
            $signature['body'],
            $signature['access_token'],
            $signature['nonce'],
            $signature['timestamp'],
            $signature['algorithm']
        ];
    }
}
