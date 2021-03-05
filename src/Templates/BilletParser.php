<?php


namespace Bradesco\Templates;


use Bradesco\Interfaces\BradescoBilletTemplateInterface;

abstract class BilletParser implements BradescoBilletTemplateInterface
{
    protected int $agenciaDestino;
    protected string $bairroPagador;
    protected string $bairroSacadorAvalista;
    protected int $cdEspecieTitulo;
    protected int $cdIndCpfcnpjPagador;
    protected int $cdIndCpfcnpjSacadorAvalista;
    protected string $cdPagamentoParcial;
    protected int $cepPagador;
    protected int $cepSacadorAvalista;
    protected int $codigoMoeda;
    protected int $complementoCepPagador;
    protected int $complementoCepSacadorAvalista;
    protected string $complementoLogradouroPagador;
    protected string $complementoLogradouroSacadorAvalista;
    protected string $controleParticipante;
    protected int $ctrlCPFCNPJ;
    protected string $dataLimiteDesconto1;
    protected string $dataLimiteDesconto2;
    protected string $dataLimiteDesconto3;
    protected int $dddPagador;
    protected int $dddSacadorAvalista;
    protected string $dtEmissaoTitulo;
    protected string $dtLimiteBonificacao;
    protected string $dtVencimentoTitulo;
    protected string $nutitulo;
    protected string $endEletronicoPagador;
    protected string $endEletronicoSacadorAvalista;
    protected int $filialCPFCNPJ;
    protected int $formaEmissao;
    protected int $idProduto;
    protected string $logradouroPagador;
    protected string $logradouroSacadorAvalista;
    protected string $municipioPagador;
    protected string $municipioSacadorAvalista;
    protected string $nomePagador;
    protected string $nomeSacadorAvalista;
    protected int $nuCPFCNPJ;
    protected string $nuCliente;
    protected int $nuCpfcnpjPagador;
    protected int $nuCpfcnpjSacadorAvalista;
    protected string $nuLogradouroPagador;
    protected string $nuLogradouroSacadorAvalista;
    protected int $nuNegociacao;
    protected int $percentualBonificacao;
    protected int $percentualDesconto1;
    protected int $percentualDesconto2;
    protected int $percentualDesconto3;
    protected int $percentualJuros;
    protected int $percentualMulta;
    protected int $prazoBonificacao;
    protected int $prazoDecurso;
    protected int $prazoProtestoAutomaticoNegativacao;
    protected int $qtdeDiasJuros;
    protected int $qtdeDiasMulta;
    protected int $qtdePagamentoParcial;
    protected int $quantidadeMoeda;
    protected int $registraTitulo;
    protected int $telefonePagador;
    protected int $telefoneSacadorAvalista;
    protected int $tipoDecurso;
    protected int $tpProtestoAutomaticoNegativacao;
    protected string $ufPagador;
    protected string $ufSacadorAvalista;
    protected int $versaoLayout;
    protected int $vlAbatimento;
    protected int $vlBonificacao;
    protected int $vlDesconto1;
    protected int $vlDesconto2;
    protected int $vlDesconto3;
    protected int $vlIOF;
    protected int $vlJuros;
    protected int $vlMulta;
    protected int $vlNominalTitulo;

    public function getAgenciaDestino(): int
    {
        return $this->agenciaDestino;
    }

    public function getBairroPagador(): string
    {
        return $this->bairroPagador;
    }

    public function getBairroSacadorAvalista(): string
    {
        return $this->bairroSacadorAvalista;
    }

    public function getCdEspecieTitulo(): int
    {
        return $this->cdEspecieTitulo;
    }

    public function getCdIndCpfcnpjPagador(): int
    {
        return $this->cdIndCpfcnpjPagador;
    }

    public function getCdIndCpfcnpjSacadorAvalista(): int
    {
        return $this->cdIndCpfcnpjSacadorAvalista;
    }

    public function getCdPagamentoParcial(): string
    {
        return $this->cdPagamentoParcial;
    }

    public function getCepPagador(): int
    {
        return $this->cepPagador;
    }

    public function getCepSacadorAvalista(): int
    {
        return $this->cepSacadorAvalista;
    }

    public function getCodigoMoeda(): int
    {
        return $this->codigoMoeda;
    }

    public function getComplementoCepPagador(): int
    {
        return $this->complementoCepPagador;
    }

    public function getComplementoCepSacadorAvalista(): int
    {
        return $this->complementoCepSacadorAvalista;
    }

    public function getComplementoLogradouroPagador(): string
    {
        return $this->complementoLogradouroPagador;
    }

    public function getComplementoLogradouroSacadorAvalista(): string
    {
        return $this->complementoLogradouroSacadorAvalista;
    }

    public function getControleParticipante(): string
    {
        return $this->controleParticipante;
    }

    public function getCtrlCPFCNPJ(): int
    {
        return $this->ctrlCPFCNPJ;
    }

    public function getDataLimiteDesconto1(): string
    {
        return $this->dataLimiteDesconto1;
    }

    public function getDataLimiteDesconto2(): string
    {
        return $this->dataLimiteDesconto2;
    }

    public function getDataLimiteDesconto3(): string
    {
        return $this->dataLimiteDesconto3;
    }

    public function getDddPagador(): int
    {
        return $this->dddPagador;
    }

    public function getDddSacadorAvalista(): int
    {
        return $this->dddSacadorAvalista;
    }

    public function getDtEmissaoTitulo(): string
    {
        return $this->dtEmissaoTitulo;
    }

    public function getDtLimiteBonificacao(): string
    {
        return $this->dtLimiteBonificacao;
    }

    public function getDtVencimentoTitulo(): string
    {
        return $this->dtVencimentoTitulo;
    }

    public function getNutitulo(): string
    {
        return $this->nutitulo;
    }

    public function getEndEletronicoPagador(): string
    {
        return $this->endEletronicoPagador;
    }

    public function getEndEletronicoSacadorAvalista(): string
    {
        return $this->endEletronicoSacadorAvalista;
    }

    public function getFilialCPFCNPJ(): int
    {
        return $this->filialCPFCNPJ;
    }

    public function getFormaEmissao(): int
    {
        return $this->formaEmissao;
    }

    public function getIdProduto(): int
    {
        return $this->idProduto;
    }

    public function getLogradouroPagador(): string
    {
        return $this->logradouroPagador;
    }

    public function getLogradouroSacadorAvalista(): string
    {
        return $this->logradouroSacadorAvalista;
    }

    public function getMunicipioPagador(): string
    {
        return $this->municipioPagador;
    }

    public function getMunicipioSacadorAvalista(): string
    {
        return $this->municipioSacadorAvalista;
    }

    public function getNomePagador(): string
    {
        return $this->nomePagador;
    }

    public function getNomeSacadorAvalista(): string
    {
        return $this->nomeSacadorAvalista;
    }

    public function getNuCPFCNPJ(): int
    {
        return $this->nuCPFCNPJ;
    }

    public function getNuCliente(): string
    {
        return $this->nuCliente;
    }

    public function getNuCpfcnpjPagador(): int
    {
        return $this->nuCpfcnpjPagador;
    }

    public function getNuCpfcnpjSacadorAvalista(): int
    {
        return $this->nuCpfcnpjSacadorAvalista;
    }

    public function getNuLogradouroPagador(): string
    {
        return $this->nuLogradouroPagador;
    }

    public function getNuLogradouroSacadorAvalista(): string
    {
        return $this->nuLogradouroSacadorAvalista;
    }

    public function getNuNegociacao(): int
    {
        return $this->nuNegociacao;
    }

    public function getPercentualBonificacao(): int
    {
        return $this->percentualBonificacao;
    }

    public function getPercentualDesconto1(): int
    {
        return $this->percentualDesconto1;
    }

    public function getPercentualDesconto2(): int
    {
        return $this->percentualDesconto2;
    }

    public function getPercentualDesconto3(): int
    {
        return $this->percentualDesconto3;
    }

    public function getPercentualJuros(): int
    {
        return $this->percentualJuros;
    }

    public function getPercentualMulta(): int
    {
        return $this->percentualMulta;
    }

    public function getPrazoBonificacao(): int
    {
        return $this->prazoBonificacao;
    }

    public function getPrazoDecurso(): int
    {
        return $this->prazoDecurso;
    }

    public function getPrazoProtestoAutomaticoNegativacao(): int
    {
        return $this->prazoProtestoAutomaticoNegativacao;
    }

    public function getQtdeDiasJuros(): int
    {
        return $this->qtdeDiasJuros;
    }

    public function getQtdeDiasMulta(): int
    {
        return $this->qtdeDiasMulta;
    }

    public function getQtdePagamentoParcial(): int
    {
        return $this->qtdePagamentoParcial;
    }

    public function getQuantidadeMoeda(): int
    {
        return $this->quantidadeMoeda;
    }

    public function getRegistraTitulo(): int
    {
        return $this->registraTitulo;
    }

    public function getTelefonePagador(): int
    {
        return $this->telefonePagador;
    }

    public function getTelefoneSacadorAvalista(): int
    {
        return $this->telefoneSacadorAvalista;
    }

    public function getTipoDecurso(): int
    {
        return $this->tipoDecurso;
    }

    public function getTpProtestoAutomaticoNegativacao(): int
    {
        return $this->tpProtestoAutomaticoNegativacao;
    }

    public function getUfPagador(): string
    {
        return $this->ufPagador;
    }

    public function getUfSacadorAvalista(): string
    {
        return $this->ufSacadorAvalista;
    }

    public function getVersaoLayout(): int
    {
        return $this->versaoLayout;
    }

    public function getVlAbatimento(): int
    {
        return $this->vlAbatimento;
    }

    public function getVlBonificacao(): int
    {
        return $this->vlBonificacao;
    }

    public function getVlDesconto1(): int
    {
        return $this->vlDesconto1;
    }

    public function getVlDesconto2(): int
    {
        return $this->vlDesconto2;
    }

    public function getVlDesconto3(): int
    {
        return $this->vlDesconto3;
    }

    public function getVlIOF(): int
    {
        return $this->vlIOF;
    }

    public function getVlJuros(): int
    {
        return $this->vlJuros;
    }

    public function getVlMulta(): int
    {
        return $this->vlMulta;
    }

    public function getVlNominalTitulo(): int
    {
        return $this->vlNominalTitulo;
    }

}