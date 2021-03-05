<?php

namespace Tests\Unit\Services;

use BlastCloud\Guzzler\UsesGuzzler;
use Bradesco\Models\Signature;
use Bradesco\Services\BilletEmissionService;
use Bradesco\Templates\BradescoBilletTemplate;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class BilletEmissionServiceTest extends TestCase
{
    use UsesGuzzler;

    private BilletEmissionService $service;
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new BilletEmissionService();
        $client = $this->guzzler->getClient(['base_uri' => "https://proxy.api.prebanco.com.br/"]);
        $this->service->setClient($client);
    }

    public function testBilletEmission()
    {
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
        $this->guzzler->expects($this->once())->willRespond(new Response(200,[],''));
        $signature = new Signature();
        $signature->setVerb('POST');
        $signature->setUri("/v1/boleto/registrarBoleto");
        $signature->setAccessToken('access_token');
        $signature->setBody($billet->parse());
        $signature->setTimestamp(Carbon::now()->setTimezone("America/Sao_Paulo")->toIso8601String());
        $signature->setNonce(Carbon::now()->getPreciseTimestamp(4));
        $signature->setAlgorithm("SHA256");
        $signature->setBradSignature('signed_string');
        $this->service->setSignature($signature);
        $request = $this->service->emit($billet);
        $this->assertInstanceOf(Response::class, $request);
        $this->assertEquals(200, $request->getStatusCode());
    }
}
