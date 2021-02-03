<?php

namespace Bradesco\Services;

use phpseclib3\File\X509;

class CertService
{

    static function certParams(array $params=['disgest_alg'=> null, 'private_key_bits'=>null ,
        'private_key_type' => null, 'encrypt_key' => null]): array
    {
        return [
            "private_key_bits" => $params['private_key_bits'] ?? 2048,
            "private_key_type" => $params['private_key_type'] ?? OPENSSL_KEYTYPE_RSA,
        ];
    }

    static function createKeyPair(array $params=['private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA]): array
    {
        return [
            "private_key_bits" => $params['private_key_bits'],
            "private_key_type" => $params['private_key_type'],
        ];
    }

    static function createOptions(array $options = []): array
    {
        return $option ?? [
            'digest_alg' => 'sha256'
        ];
    }

    static function createDomain(array $domain = ['countryName' => 'BR', 'stateOrProvinceName' => 'RS',
        'localityName' => 'CURITIBA', 'organizationName' => 'Minha Empresa LTDA', 'organizationUnitName'=>'',
        'commonName' => 'Michael Ferreira',
        'emailAddress' => 'oliveiramichael@outlook.com']): array
    {
        return [
            "countryName" => $domain['countryName'],
            "stateOrProvinceName" => $domain['stateOrProvinceName'],
            "localityName" => $domain['localityName'],
            "organizationName" => $domain['organizationName'],
            "organizationalUnitName" => $domain['organizationUnitName'],
            "commonName" => $domain['commonName'],
            "emailAddress" => $domain['emailAddress']
        ];
    }

    static function createExtraAttributes(array $extra_attributes=[]): array
    {
        return $extra_attributes;
    }

    final static function createCertificate(X509 $x509_cert)
    {
        $domain = $domain ?? self::createDomain();
        $privateKey = openssl_pkey_new($privateKey ?? self::createKeyPair());
        $options = $options ?? self::createOptions();
        $extra = $extra ?? self::createExtraAttributes();
        $csr = $certificate ?? openssl_csr_new($domain, $privateKey, $options, $extra);
        $cet_x509=openssl_csr_sign($csr, $ca_certificate, $privateKey, $days??365, $options);
        openssl_csr_export($csr, $csrout) and var_dump($csrout);
        openssl_x509_export($cet_x509, $certout) and var_dump($certout);
        openssl_pkey_export($privateKey, $pkeyout, "mypassword") and var_dump($pkeyout);
    }
}
