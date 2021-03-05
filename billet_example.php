<?php

use Bradesco\Models\Signature;
use Bradesco\Services\AuthService;
use Bradesco\Services\BilletEmissionService;
use Bradesco\Services\JWTService;
use Bradesco\Services\SignatureService;
use Bradesco\Templates\BradescoBilletTemplate;
use Carbon\Carbon;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require 'vendor/autoload.php';

echo "Create billet...";
$billet = new BradescoBilletTemplate();
$billet->setAgenciaDestino(3995);
$billet->setBairroPagador('São Vicente');
$billet->setBairroSacadorAvalista('');
$billet->setCdEspecieTitulo(2);
$billet->setCdIndCpfcnpjPagador(1);
$billet->setCdIndCpfcnpjSacadorAvalista(0);
$billet->setCdPagamentoParcial('');
$billet->setCepPagador(85506);
$billet->setCepSacadorAvalista(0);
$billet->setCodigoMoeda(9);
$billet->setComplementoCepPagador(320);
$billet->setComplementoCepSacadorAvalista(0);
$billet->setComplementoLogradouroPagador('');
$billet->setComplementoLogradouroSacadorAvalista('');
$billet->setControleParticipante('');
$billet->setCtrlCPFCNPJ(1);
$billet->setDataLimiteDesconto1('');
$billet->setDataLimiteDesconto2('');
$billet->setDataLimiteDesconto3('');
$billet->setDddPagador(46);
$billet->setDddSacadorAvalista(0);
$billet->setDtEmissaoTitulo('12.02.2021');
$billet->setDtLimiteBonificacao('');
$billet->setDtVencimentoTitulo('14.02.2021');
$billet->setNutitulo("2346");
$billet->setEndEletronicoPagador('');
$billet->setEndEletronicoSacadorAvalista('');
$billet->setFilialCPFCNPJ(57);
$billet->setFormaEmissao(0);
$billet->setIdProduto(9);
$billet->setlogradouroPagador('Possídio Salomoni');
$billet->setLogradouroSacadorAvalista('');
$billet->setMunicipioPagador('Pato Branco');
$billet->setMunicipioSacadorAvalista('');
$billet->setNomePagador('Natália Loren Stachechen');
$billet->setNomeSacadorAvalista('');
$billet->setNuCPFCNPJ(38052160);
$billet->setNuCliente('2799');
$billet->setNuCpfcnpjPagador(1352808692);
$billet->setNuCpfcnpjSacadorAvalista(0);
$billet->setNuLogradouroPagador('548');
$billet->setNuLogradouroSacadorAvalista('');
$billet->setNuNegociacao(399500000000075557);
$billet->setPercentualBonificacao(0);
$billet->setPercentualDesconto1(0);
$billet->setPercentualDesconto2(0);
$billet->setPercentualDesconto3(0);
$billet->setPercentualJuros(0);
$billet->setPercentualMulta(0);
$billet->setPrazoBonificacao(0);
$billet->setPrazoDecurso(0);
$billet->setPrazoProtestoAutomaticoNegativacao(0);
$billet->setQtdeDiasJuros(0);
$billet->setQtdeDiasMulta(0);
$billet->setQtdePagamentoParcial(0);
$billet->setQuantidadeMoeda(0);
$billet->setRegistraTitulo(1);
$billet->setTelefonePagador(987456321);
$billet->setTelefoneSacadorAvalista(0);
$billet->setTipoDecurso(0);
$billet->setTpProtestoAutomaticoNegativacao(0);
$billet->setUfPagador('PR');
$billet->setUfSacadorAvalista('');
$billet->setVersaoLayout(1);
$billet->setVlAbatimento(0);
$billet->setVlBonificacao(0);
$billet->setVlDesconto1(0);
$billet->setVlDesconto2(0);
$billet->setVlDesconto3(0);
$billet->setVlIOF(0);
$billet->setVlJuros(0);
$billet->setVlMulta(0);
$billet->setVlNominalTitulo(15000);
echo "ok\n";

file_put_contents('billet.txt', json_encode($billet->parse()));

$jwt = new JWTService();
// SET PAYLOAD
print "Set payload...";
$jwt->setPayload([
    'sub' => 'id',
    'iat' => Carbon::now()->getPreciseTimestamp(0),
    'exp' => Carbon::now()->addMonth()->getPreciseTimestamp(0),
    'jti' => Carbon::now()->getPreciseTimestamp(3)
]);
print "OK!\n";

// CREATE JWT TOKEN
print "Create jwt token...";
$token = $jwt->createJWTToken(__DIR__ . '/certificate_path', 'password');
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
$signature->setUri("/v1/boleto/registrarBoleto");
$signature->setAccessToken($access_token);
$signature->setBody($billet->parse());
$signature->setTimestamp(Carbon::now()->setTimezone("America/Sao_Paulo")->toIso8601String());
$signature->setNonce(Carbon::now()->getPreciseTimestamp(4));
$signature->setAlgorithm("SHA256");
print "OK!\n";

// CREATE X-BRAD-SIGNATURE
print "Create X-Brad-Signature...";
$bradSignature = SignatureService::bradRequestSignature($signature, __DIR__ . '/certificate_path', 'nettel@telecom2021');
$signature->setBradSignature(base64_encode($bradSignature));
file_put_contents('signature.txt', $signature->getBradSignature());
print "OK!\n";
file_put_contents('request.txt',SignatureService::requestString($signature));

$cache = new FilesystemAdapter('token',60*60,'token');

$billetEmissionService = new BilletEmissionService($cache);
$billetEmissionService->setSignature($signature);
$response = $billetEmissionService->emit($billet);
echo $response->getBody()->getContents();
