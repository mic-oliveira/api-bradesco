<?php

use Bradesco\Models\Signature;
use Bradesco\Services\AuthService;
use Bradesco\Services\JWTService;
use Bradesco\Services\SignatureService;
use Carbon\Carbon;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

include './vendor/autoload.php';

print "Create JWT Service instance...";
$jwt = new JWTService();
Print "OK!\n";

try {
    // SET PAYLOAD
    print "Set payload...";
    $jwt->setPayload([
        'sub' => 'id_application',
        'iat' => Carbon::now()->getPreciseTimestamp(0),
        'exp' => Carbon::now()->addMonth()->getPreciseTimestamp(0),
        'jti' => Carbon::now()->getPreciseTimestamp(3)
    ]);
    print "OK!\n";

    // CREATE JWT TOKEN
    print "Create jwt token...";
    $token = $jwt->createJWTToken(__DIR__ . '/nettel.teste.com.key.pem', 'nettel@telecom2021');
    file_put_contents('json_token.txt', $token);
    print "OK!\n";

    // CREATE ACCESS TOKEN
    print "Create access token...";
    $cache = new FilesystemAdapter('token',60*60,'token');
    $auth = new AuthService($cache);
    $access_token = $auth->accessToken($token);
    file_put_contents('access_token.txt', $access_token);
    print "OK!\n";

    // Signature Instance
    print "Create signature instance...";
    $signature = new Signature();
    $signature->setVerb('POST');
    $signature->setUri("/v1.1/jwt-service");
    $signature->setAgency(6796);
    $signature->setAccount(12041);
    $signature->setAccessToken($access_token);
    $signature->setBody(["teste" => "valor"]);
    $signature->setTimestamp(Carbon::now()->setTimezone("America/Sao_Paulo")->toIso8601String());
    $signature->setNonce(Carbon::now()->getPreciseTimestamp(4));
    $signature->setAlgorithm("sha256");
    print "OK!\n";

    // CREATE X-BRAD-SIGNATURE
    print "Create X-Brad-Signature...";
    $bradSignature = SignatureService::bradRequestSignature($signature, __DIR__ . '/nettel.teste.com.key.pem', 'nettel@telecom2021');
    $signature->setBradSignature(base64_encode($bradSignature));
    print "OK!\n";

    // AUTH TEST
    print "Trying request service...";
    $auth_test = $auth->authorize($signature);
    print "OK!\n";

    printf("Response: %s", $auth_test);

} catch (Exception $exception) {
    var_dump($exception);
    printf("\n\nErro!\n%s | %s",$exception->getMessage(), $exception->getTraceAsString());
}
