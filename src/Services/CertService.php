<?php

namespace Bradesco\Services;

use Exception;

class CertService
{
    private array $distinguished_names = [
        "countryName" => "GB",
        "stateOrProvinceName" => "Somerset",
        "localityName" => "Glastonbury",
        "organizationName" => "The Brain Room Limited",
        "organizationalUnitName" => "Teste",
        "commonName" => "Wez Furlong",
        "emailAddress" => "wez@example.com"
    ];

    private array $key_params = ['digest_alg' => 'sha256',
        'private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA];

    public function createPrivateKey(string $key_path): bool
    {
        try {
            $private_key = openssl_pkey_new($this->key_params);
            openssl_pkey_export($private_key,$key);
            $key_created = file_exists($key_path) || file_put_contents($key_path,$key);
            chmod($key_path, 0766);
            return $key_created;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPublicKey(string $private_Key_path,string $public_key_path): bool
    {
        try{
            CertService::validateKeyPath($private_Key_path);
            $private_Key = file_get_contents($private_Key_path);
            $key = openssl_get_privatekey($private_Key);
            $public_key = openssl_pkey_get_details($key)['key'];
            $cert_created = file_exists($public_key_path) || file_put_contents($public_key_path, $public_key);
            chmod($public_key_path, 0766);
            return $cert_created;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createCertificate(string $private_key_path, string $x509_path, $password = null,
                                      array $options = ['days'=>365,'ca_certificate'=> null]): bool
    {
        try{
            CertService::validateKeyPath($private_key_path);
            $key = openssl_get_privatekey($private_key_path,$password);
            $csr = openssl_csr_new($this->distinguished_names,$key,$this->key_params);
            $cert = openssl_csr_sign($csr,$options['ca_certificate'],$key,$options['days']);
            $x509_cert = openssl_x509_export_to_file($cert,$x509_path);
            chmod($x509_path, 0766);
            return $x509_cert;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    static public function keyExists($private_key_path){
        return file_exists($private_key_path);
    }

    static public function keyNotExists($private_key_path) {
        return !self::keyExists($private_key_path);
    }

    static function validateKeyPath($private_key_path) {
        if (CertService::keyNotExists($private_key_path)) {
            throw new Exception('Private key not found.');
        }
    }

    public function setKeyParams(array $key_params=[]): array
    {
        $this->key_params = $key_params;
    }

    public function setDistinguishedNames(array $distinguished_names = []): array
    {
        $this->distinguished_names = $distinguished_names;
    }

    public function getDistinguishedNames(): array
    {
        return $this->distinguished_names;
    }

    public function getKeyParams(): array
    {
        return $this->key_params;
    }

}
