<?php


namespace Bradesco\Interfaces;


interface BradescoBilletTemplateInterface
{
    public function getAgenciaDestino();
    public function getBairroPagador();
    public function getBairroPagadorAvalista();
    public function getCdEspecieTitulo();
    public function getCdIndCpfcnpjPagador();
    public function getCdIndCpfcnpjSacadorAvalista();
    public function getCdPagamentoParcial();
    public function getCepPagador();
    public function getCepSacadorAvalista();
    public function getCodigoMoeda();
    public function getComplementoCepPagador();
    public function getComplementoCepSacadorAvalista();
    public function getComplementoLogradouroPagador();
    public function getComplementoLogradouroSacadorAvalista();
    public function getControleParticipante();
    public function getCtrlCPFCNPJ();
    public function getDataLimiteDesconto1();
    public function getDataLimiteDesconto2();
    public function getDataLimiteDesconto3();
    public function getDddPagador();
    public function getDddSacadorAvalista();
    public function getDtEmissaoTitulo();
    public function getDtLimiteBonificacao();
    public function getDtVencimentoTitulo();
    public function getNutitulo();
    public function getEndEletronicoPagador();
    public function getEndEletronicoSacadorAvalista();
    public function getFilialCPFCNPJ();
    public function getFormaEmissao();
    public function getIdProduto();
    public function getLogradouroPagador();
    public function getLogradouroSacadorAvalista();
    public function getMunicipioPagador();
    public function getMunicipioSacadorAvalista();
    public function getNomePagador();
    public function getNomeSacadorAvalista();
    public function getNuCPFCNPJ();
    public function getNuCliente();
    public function getNuCpfcnpjPagador();
    public function getNuCpfcnpjSacadorAvalista();
    public function getNuLogradouroPagador();
    public function getNuLogradouroSacadorAvalista();
    public function getNuNegociacao();
    public function getPercentualBonificacao();
    public function getPercentualDesconto1();
    public function getPercentualDesconto2();
    public function getPercentualDesconto3();
    public function getPercentualJuros();
    public function getPercentualMulta();
    public function getPrazoBonificacao();
    public function getPrazoDecurso();
    public function getPrazoProtestoAutomaticoNegativacao();
    public function getQtdeDiasJuros();
    public function getQtdeDiasMulta();
    public function getQtdePagamentoParcial();
    public function getQuantidadeMoeda();
    public function getRegistraTitulo();
    public function getTelefonePagador();
    public function getTelefoneSacadorAvalista();
    public function getTipoDecurso();
    public function getTpProtestoAutomaticoNegativacao();
    public function getUfPagador();
    public function getUfSacadorAvalista();
    public function getVersaoLayout();
    public function getVlAbatimento();
    public function getVlBonificacao();
    public function getVlDesconto1();
    public function getVlDesconto2();
    public function getVlDesconto3();
    public function getVlIOF();
    public function getVlJuros();
    public function getVlMulta();
    public function getVlNominalTitulo();
}