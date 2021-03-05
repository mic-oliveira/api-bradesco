<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;

class SignatureService
{

    static public function createRequestArray(Signature $signature): array
    {
        return [
            $signature->getVerb(),
            $signature->getUri(),
            $signature->getAgency(),
            $signature->getAccount(),
            json_encode($signature->getBody()),
            $signature->getAccessToken(),
            $signature->getNonce(),
            $signature->getTimestamp(),
            $signature->getAlgorithm()
        ];
    }

    static public function requestString(Signature $signature): string
    {
        $array = array_diff(self::createRequestArray($signature),['',null]);
        return empty($signature->getAgency()) || empty($signature->getAccount()) ?
            vsprintf("%s\n%s\n\n%s\n%s\n%d\n%s\n%s", $array) :
            vsprintf("%s\n%s\nagencia=%d&conta=%d\n%s\n%s\n%d\n%s\n%s", $array);
    }

    static public function bradRequestSignature(Signature $signature, $private_key, $password = null)
    {
        return CertService::sign(self::requestString($signature), $private_key, $password);
    }
}
