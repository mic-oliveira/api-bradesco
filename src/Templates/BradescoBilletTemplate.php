<?php


namespace Bradesco\Templates;


class BradescoBilletTemplate extends BilletParser
{

    public function setAgenciaDestino(int $agenciaDestino): void
    {
        $this->agenciaDestino = $agenciaDestino;
    }

    public function setBairroPagador(string $bairroPagador): void
    {
        $this->bairroPagador = $bairroPagador;
    }

    public function setBairroSacadorAvalista(string $bairroSacadorAvalista): void
    {
        $this->bairroSacadorAvalista = $bairroSacadorAvalista;
    }

    public function setCdEspecieTitulo(int $cdEspecieTitulo): void
    {
        $this->cdEspecieTitulo = $cdEspecieTitulo;
    }

    public function setCdIndCpfcnpjPagador(int $cdIndCpfcnpjPagador): void
    {
        $this->cdIndCpfcnpjPagador = $cdIndCpfcnpjPagador;
    }

    public function setCdIndCpfcnpjSacadorAvalista(int $cdIndCpfcnpjSacadorAvalista): void
    {
        $this->cdIndCpfcnpjSacadorAvalista = $cdIndCpfcnpjSacadorAvalista;
    }

    public function setCdPagamentoParcial(string $cdPagamentoParcial): void
    {
        $this->cdPagamentoParcial = $cdPagamentoParcial;
    }

    public function setCepPagador(int $cepPagador): void
    {
        $this->cepPagador = $cepPagador;
    }

    public function setCepSacadorAvalista(int $cepSacadorAvalista): void
    {
        $this->cepSacadorAvalista = $cepSacadorAvalista;
    }

    public function setCodigoMoeda(int $codigoMoeda): void
    {
        $this->codigoMoeda = $codigoMoeda;
    }

    public function setComplementoCepPagador(int $complementoCepPagador): void
    {
        $this->complementoCepPagador = $complementoCepPagador;
    }

    public function setComplementoCepSacadorAvalista(int $complementoCepSacadorAvalista): void
    {
        $this->complementoCepSacadorAvalista = $complementoCepSacadorAvalista;
    }

    public function setComplementoLogradouroPagador(string $complementoLogradouroPagador): void
    {
        $this->complementoLogradouroPagador = $complementoLogradouroPagador;
    }

    public function setComplementoLogradouroSacadorAvalista(string $complementoLogradouroSacadorAvalista): void
    {
        $this->complementoLogradouroSacadorAvalista = $complementoLogradouroSacadorAvalista;
    }

    public function setControleParticipante(string $controleParticipante): void
    {
        $this->controleParticipante = $controleParticipante;
    }

    public function setCtrlCPFCNPJ(int $ctrlCPFCNPJ): void
    {
        $this->ctrlCPFCNPJ = $ctrlCPFCNPJ;
    }

    public function setDataLimiteDesconto1(string $dataLimiteDesconto1): void
    {
        $this->dataLimiteDesconto1 = $dataLimiteDesconto1;
    }

    public function setDataLimiteDesconto2(string $dataLimiteDesconto2): void
    {
        $this->dataLimiteDesconto2 = $dataLimiteDesconto2;
    }

    public function setDataLimiteDesconto3(string $dataLimiteDesconto3): void
    {
        $this->dataLimiteDesconto3 = $dataLimiteDesconto3;
    }

    public function setDddPagador(int $dddPagador): void
    {
        $this->dddPagador = $dddPagador;
    }

    public function setDddSacadorAvalista(int $dddSacadorAvalista): void
    {
        $this->dddSacadorAvalista = $dddSacadorAvalista;
    }

    public function setDtEmissaoTitulo(string $dtEmissaoTitulo): void
    {
        $this->dtEmissaoTitulo = $dtEmissaoTitulo;
    }

    public function setDtLimiteBonificacao(string $dtLimiteBonificacao): void
    {
        $this->dtLimiteBonificacao = $dtLimiteBonificacao;
    }

    public function setDtVencimentoTitulo(string $dtVencimentoTitulo): void
    {
        $this->dtVencimentoTitulo = $dtVencimentoTitulo;
    }

    public function setNutitulo(string $nutitulo): void
    {
        $this->nutitulo = $nutitulo;
    }

    public function setEndEletronicoPagador(string $endEletronicoPagador): void
    {
        $this->endEletronicoPagador = $endEletronicoPagador;
    }

    public function setEndEletronicoSacadorAvalista(string $endEletronicoSacadorAvalista): void
    {
        $this->endEletronicoSacadorAvalista = $endEletronicoSacadorAvalista;
    }

    public function setFilialCPFCNPJ(int $filialCPFCNPJ): void
    {
        $this->filialCPFCNPJ = $filialCPFCNPJ;
    }

    public function setFormaEmissao(int $formaEmissao): void
    {
        $this->formaEmissao = $formaEmissao;
    }

    public function setIdProduto(int $idProduto): void
    {
        $this->idProduto = $idProduto;
    }

    public function setLogradouroPagador(string $logradouroPagador): void
    {
        $this->logradouroPagador = $logradouroPagador;
    }

    public function setLogradouroSacadorAvalista(string $logradouroSacadorAvalista): void
    {
        $this->logradouroSacadorAvalista = $logradouroSacadorAvalista;
    }

    public function setMunicipioPagador(string $municipioPagador): void
    {
        $this->municipioPagador = $municipioPagador;
    }

    public function setMunicipioSacadorAvalista(string $municipioSacadorAvalista): void
    {
        $this->municipioSacadorAvalista = $municipioSacadorAvalista;
    }

    public function setNomePagador(string $nomePagador): void
    {
        $this->nomePagador = $nomePagador;
    }

    public function setNomeSacadorAvalista(string $nomeSacadorAvalista): void
    {
        $this->nomeSacadorAvalista = $nomeSacadorAvalista;
    }

    public function setNuCPFCNPJ(int $nuCPFCNPJ): void
    {
        $this->nuCPFCNPJ = $nuCPFCNPJ;
    }

    public function setNuCliente(string $nuCliente): void
    {
        $this->nuCliente = $nuCliente;
    }

    public function setNuCpfcnpjPagador(int $nuCpfcnpjPagador): void
    {
        $this->nuCpfcnpjPagador = $nuCpfcnpjPagador;
    }

    public function setNuCpfcnpjSacadorAvalista(int $nuCpfcnpjSacadorAvalista): void
    {
        $this->nuCpfcnpjSacadorAvalista = $nuCpfcnpjSacadorAvalista;
    }

    public function setNuLogradouroPagador(string $nuLogradouroPagador): void
    {
        $this->nuLogradouroPagador = $nuLogradouroPagador;
    }

    public function setNuLogradouroSacadorAvalista(string $nuLogradouroSacadorAvalista): void
    {
        $this->nuLogradouroSacadorAvalista = $nuLogradouroSacadorAvalista;
    }

    public function setNuNegociacao(int $nuNegociacao): void
    {
        $this->nuNegociacao = $nuNegociacao;
    }

    public function setPercentualBonificacao(int $percentualBonificacao): void
    {
        $this->percentualBonificacao = $percentualBonificacao;
    }

    public function setPercentualDesconto1(int $percentualDesconto1): void
    {
        $this->percentualDesconto1 = $percentualDesconto1;
    }

    public function setPercentualDesconto2(int $percentualDesconto2): void
    {
        $this->percentualDesconto2 = $percentualDesconto2;
    }

    public function setPercentualDesconto3(int $percentualDesconto3): void
    {
        $this->percentualDesconto3 = $percentualDesconto3;
    }

    public function setPercentualJuros(int $percentualJuros): void
    {
        $this->percentualJuros = $percentualJuros;
    }

    public function setPercentualMulta(int $percentualMulta): void
    {
        $this->percentualMulta = $percentualMulta;
    }

    public function setPrazoBonificacao(int $prazoBonificacao): void
    {
        $this->prazoBonificacao = $prazoBonificacao;
    }

    public function setPrazoDecurso(int $prazoDecurso): void
    {
        $this->prazoDecurso = $prazoDecurso;
    }

    public function setPrazoProtestoAutomaticoNegativacao(int $prazoProtestoAutomaticoNegativacao): void
    {
        $this->prazoProtestoAutomaticoNegativacao = $prazoProtestoAutomaticoNegativacao;
    }

    public function setQtdeDiasJuros(int $qtdeDiasJuros): void
    {
        $this->qtdeDiasJuros = $qtdeDiasJuros;
    }

    public function setQtdeDiasMulta(int $qtdeDiasMulta): void
    {
        $this->qtdeDiasMulta = $qtdeDiasMulta;
    }

    public function setQtdePagamentoParcial(int $qtdePagamentoParcial): void
    {
        $this->qtdePagamentoParcial = $qtdePagamentoParcial;
    }

    public function setQuantidadeMoeda(int $quantidadeMoeda): void
    {
        $this->quantidadeMoeda = $quantidadeMoeda;
    }

    public function setRegistraTitulo(int $registraTitulo): void
    {
        $this->registraTitulo = $registraTitulo;
    }

    public function setTelefonePagador(int $telefonePagador): void
    {
        $this->telefonePagador = $telefonePagador;
    }

    public function setTelefoneSacadorAvalista(int $telefoneSacadorAvalista): void
    {
        $this->telefoneSacadorAvalista = $telefoneSacadorAvalista;
    }

    public function setTipoDecurso(int $tipoDecurso): void
    {
        $this->tipoDecurso = $tipoDecurso;
    }

    public function setTpProtestoAutomaticoNegativacao(int $tpProtestoAutomaticoNegativacao): void
    {
        $this->tpProtestoAutomaticoNegativacao = $tpProtestoAutomaticoNegativacao;
    }

    public function setUfPagador(string $ufPagador): void
    {
        $this->ufPagador = $ufPagador;
    }

    public function setUfSacadorAvalista(string $ufSacadorAvalista): void
    {
        $this->ufSacadorAvalista = $ufSacadorAvalista;
    }

    public function setVersaoLayout(int $versaoLayout): void
    {
        $this->versaoLayout = $versaoLayout;
    }

    public function setVlAbatimento(int $vlAbatimento): void
    {
        $this->vlAbatimento = $vlAbatimento;
    }

    public function setVlBonificacao(int $vlBonificacao): void
    {
        $this->vlBonificacao = $vlBonificacao;
    }

    public function setVlDesconto1(int $vlDesconto1): void
    {
        $this->vlDesconto1 = $vlDesconto1;
    }

    public function setVlDesconto2(int $vlDesconto2): void
    {
        $this->vlDesconto2 = $vlDesconto2;
    }

    public function setVlDesconto3(int $vlDesconto3): void
    {
        $this->vlDesconto3 = $vlDesconto3;
    }

    public function setVlIOF(int $vlIOF): void
    {
        $this->vlIOF = $vlIOF;
    }

    public function setVlJuros(int $vlJuros): void
    {
        $this->vlJuros = $vlJuros;
    }

    public function setVlMulta(int $vlMulta): void
    {
        $this->vlMulta = $vlMulta;
    }

    public function setVlNominalTitulo(int $vlNominalTitulo): void
    {
        $this->vlNominalTitulo = $vlNominalTitulo;
    }

    public function parse()
    {
        return [
            "agenciaDestino" => $this->getAgenciaDestino(),
            "bairroPagador" => $this->getBairroPagador(),
            "bairroSacadorAvalista" => $this->getBairroSacadorAvalista(),
            "cdEspecieTitulo" => $this->getCdEspecieTitulo(),
            "cdIndCpfcnpjPagador" => $this->getCdIndCpfcnpjPagador(),
            "cdIndCpfcnpjSacadorAvalista" => $this->getCdIndCpfcnpjSacadorAvalista(),
            "cdPagamentoParcial" => $this->getCdPagamentoParcial(),
            "cepPagador" => $this->getCepPagador(),
            "cepSacadorAvalista" => $this->getCepSacadorAvalista(),
            "codigoMoeda" => $this->getCodigoMoeda(),
            "complementoCepPagador" => $this->getComplementoCepPagador(),
            "complementoCepSacadorAvalista" => $this->getComplementoCepSacadorAvalista(),
            "complementoLogradouroPagador" => $this->getComplementoLogradouroPagador(),
            "complementoLogradouroSacadorAvalista" => $this->getComplementoLogradouroSacadorAvalista(),
            "controleParticipante" => $this->getControleParticipante(),
            "ctrlCPFCNPJ" => $this->getCtrlCPFCNPJ(),
            "dataLimiteDesconto1" => $this->getDataLimiteDesconto1(),
            "dataLimiteDesconto2" => $this->getDataLimiteDesconto2(),
            "dataLimiteDesconto3" => $this->getDataLimiteDesconto3(),
            "dddPagador" => $this->getDddPagador(),
            "dddSacadorAvalista" => $this->getDddSacadorAvalista(),
            "dtEmissaoTitulo" => $this->getDtEmissaoTitulo(),
            "dtLimiteBonificacao" => $this->getDtLimiteBonificacao(),
            "dtVencimentoTitulo" => $this->getDtVencimentoTitulo(),
            "nutitulo" => $this->getNutitulo(),
            "endEletronicoPagador" => $this->getEndEletronicoPagador(),
            "endEletronicoSacadorAvalista" => $this->getEndEletronicoSacadorAvalista(),
            "filialCPFCNPJ" => $this->getFilialCPFCNPJ(),
            "formaEmissao" => $this->getFormaEmissao(),
            "idProduto" => $this->getIdProduto(),
            "logradouroPagador" => $this->getLogradouroPagador(),
            "logradouroSacadorAvalista" => $this->getLogradouroSacadorAvalista(),
            "municipioPagador" => $this->getMunicipioPagador(),
            "municipioSacadorAvalista" => $this->getMunicipioSacadorAvalista(),
            "nomePagador" => $this->getNomePagador(),
            "nomeSacadorAvalista" => $this->getNomeSacadorAvalista(),
            "nuCPFCNPJ" => $this->getNuCPFCNPJ(),
            "nuCliente" => $this->getNuCliente(),
            "nuCpfcnpjPagador" => $this->getNuCpfcnpjPagador(),
            "nuCpfcnpjSacadorAvalista" => $this->getNuCpfcnpjSacadorAvalista(),
            "nuLogradouroPagador" => $this->getNuLogradouroPagador(),
            "nuLogradouroSacadorAvalista" => $this->getNuLogradouroSacadorAvalista(),
            "nuNegociacao" => $this->getNuNegociacao(),
            "percentualBonificacao" => $this->getPercentualBonificacao(),
            "percentualDesconto1" => $this->getPercentualDesconto1(),
            "percentualDesconto2" => $this->getPercentualDesconto2(),
            "percentualDesconto3" => $this->getPercentualDesconto3(),
            "percentualJuros" => $this->percentualJuros,
            "percentualMulta" => $this->getPercentualMulta(),
            "prazoBonificacao" => $this->getPrazoBonificacao(),
            "prazoDecurso" => $this->getPrazoDecurso(),
            "prazoProtestoAutomaticoNegativacao" => $this->getPrazoProtestoAutomaticoNegativacao(),
            "qtdeDiasJuros" => $this->getQtdeDiasJuros(),
            "qtdeDiasMulta" => $this->getQtdeDiasMulta(),
            "qtdePagamentoParcial" => $this->getQtdePagamentoParcial(),
            "quantidadeMoeda" => $this->getQuantidadeMoeda(),
            "registraTitulo" => $this->getRegistraTitulo(),
            "telefonePagador" => $this->getTelefonePagador(),
            "telefoneSacadorAvalista" => $this->getTelefoneSacadorAvalista(),
            "tipoDecurso" => $this->getTipoDecurso(),
            "tpProtestoAutomaticoNegativacao" => $this->getTpProtestoAutomaticoNegativacao(),
            "ufPagador" => $this->getUfPagador(),
            "ufSacadorAvalista" => $this->getUfSacadorAvalista(),
            "versaoLayout" => $this->versaoLayout,
            "vlAbatimento" => $this->getVlAbatimento(),
            "vlBonificacao" => $this->getVlBonificacao(),
            "vlDesconto1" => $this->getVlDesconto1(),
            "vlDesconto2" => $this->getVlDesconto2(),
            "vlDesconto3" => $this->getVlDesconto3(),
            "vlIOF" => $this->getVlIOF(),
            "vlJuros" => $this->getVlJuros(),
            "vlMulta" => $this->getVlMulta(),
            "vlNominalTitulo" => $this->getVlNominalTitulo(),
        ];
    }
}