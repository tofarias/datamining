<?php namespace TiagoFarias\DataMining;

/**
 * Prepara os dados processados para escrever no arquivo
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Relatorio
{
    private $arquivo;
    private $relatorioDetalhe;

    public function __construct(EscritorArquivo $arquivo, IRelatorioDetalhe $relatorioDetalhe)
    {
        $this->arquivo = $arquivo;
        $this->relatorioDetalhe = $relatorioDetalhe;
    }

    public function gerar()
    {
        $dados   = Array();
        $dados[] = '1. Quantidade de clientes informados: '.$this->relatorioDetalhe->calcularTotalClientes();
        $dados[] = '2. Quantidade de vendedores informados: '.$this->relatorioDetalhe->calcularTotalVendedores();
        $dados[] = '3. Média salarial dos vendedores: '.$this->relatorioDetalhe->calcularMediaSalarialVendedores();
        $dados[] = '4. ID da venda mais cara: '.$this->relatorioDetalhe->buscarIdVendaMaisCara();
        $dados[] = '5. Pior vendedor: '.$this->relatorioDetalhe->buscarPiorVendedor();

        $this->arquivo->escrever( $dados );
    }
}