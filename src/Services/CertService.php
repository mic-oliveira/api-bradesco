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

    private array $key_params = ['digest_alg' => null,
        'private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA];

    public function createPrivateKey(string $key_path,string $passphrase = null, array $options = null): bool
    {
        try {
            $private_key = openssl_pkey_new($this->key_params);
            openssl_pkey_export($private_key,$key,$passphrase,$options);
            $key_created = file_exists($key_path) || file_put_contents($key_path,$key);
            chmod($key_path, 0766);
            return $key_created;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPublicKey(string $private_key_path,string $public_key_path,string $passphrase = null): bool
    {
        try{
            $key = $key = $this->getPrivateKey($private_key_path, $passphrase);
            $public_key = openssl_pkey_get_details($key)['key'];
            $cert_created = file_exists($public_key_path) || file_put_contents($public_key_path, $public_key);
            chmod($public_key_path, 0766);
            return $cert_created;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createCertificate(string $private_key_path, string $cert_path,
                                      string $passphrase=null,
                                      int $days=1125,$ca_certificate=null, array $options=['digest_alg'=>'sha256']): bool
    {
        try {
            $key = $this->getPrivateKey($private_key_path, $passphrase);
            $csr = openssl_csr_new($this->distinguished_names, $key,$this->key_params);
            if ($csr)
            {
                openssl_csr_export_to_file($csr, $cert_path.'.csr');
                $certificate = openssl_csr_sign($csr,$ca_certificate,$key,$days,$options);
                $cert_created = openssl_x509_export_to_file($certificate,$cert_path);
                chmod($cert_path, 0766);
                chmod($cert_path.'.csr', 0766);
            }
            return $cert_created ?? false;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrivateKey(string $private_key_path, string $passphrase = null)
    {
        CertService::validateKeyPath($private_key_path);
        return openssl_get_privatekey(file_get_contents($private_key_path), $passphrase);
    }

    public function verifyX509(string $cert_path,string $public_key_path): int
    {
        $key = openssl_get_publickey(file_get_contents($public_key_path));
        $cert = openssl_x509_read(file_get_contents($cert_path));
        return openssl_x509_verify($cert, $key);
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

    static function sign(string $data, string $private_key='path', string $passphrase=null, string $alg='SHA256')
    {
        try {
            $key = (new CertService)->getPrivateKey($private_key, $passphrase);
            openssl_sign($data,$signed_data, $key, $alg);
            return $signed_data;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
