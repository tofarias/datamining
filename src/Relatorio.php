<?php namespace TiagoFarias\DataMining;

use IFormato;
use TiagoFarias\DataMining\Entidades\{Entidade, EntidadeMapper};
use TiagoFarias\DataMining\Entidades\TraitEntidade;

class Relatorio
{
    use TraitEntidade;

    private $arquivo;
    private $dados;
    private $entidadeMapper;
    private $dadosId;

    public function __construct(FOpen $arquivo)
    {
        $this->dados = $arquivo->ler()->getDados();
        $this->entidadeMapper = new EntidadeMapper();
        $this->mapearEntidades();
        echo 'calcularTotalClientes: '.$this->calcularTotalClientes();
        echo '<br>';
        echo 'calcularTotalVendedores: '.$this->calcularTotalVendedores();
        echo '<br>';
        echo 'calcularMediaSalarialVendedores: '.$this->calcularMediaSalarialVendedores();
        echo '<br>';
        echo 'buscarIdVendaMaisCara: '.$this->buscarIdVendaMaisCara();
        echo '<br>';
        echo 'buscarPiorVendedor: '.$this->buscarPiorVendedor();
    }

    private function mapearEntidades()
    {
        $this->dadosId = [];
        foreach ($this->dados as $key => $dados) {
            $d = $this->entidadeMapper->getEntidade( $dados );
            $this->dadosId[key($d)][] = current(array_values($d));
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function calcularTotalClientes() : int
    {
        return count($this->dadosId['CUSTOMER']);
    }

    public function calcularTotalVendedores() : int
    {
        return count($this->dadosId['SALESMAN']);
    }

    /**
     * Undocumented function
     *
     * @return float
     */
    public function calcularMediaSalarialVendedores() : float
    {
        $totalSalario = 0;
        foreach ($this->dadosId['SALESMAN'] as $key => $value) {
            $totalSalario += $value['salary'];
        }
        return $totalSalario / $this->calcularTotalVendedores();
    }

    public function buscarIdVendaMaisCara() : int
    {
        $vendaMaisCara = [];
        $sale = $this->dadosId['SALE'];
        foreach ($sale as $keySale => $saleValue) {
            $item = $saleValue['ITEM'];
            $totalVenda = 0;
            foreach ($item as $keyItem => $itemValue) {
                $totalVenda += ( $itemValue['PRICE_ITEM'] * $itemValue['QUANTITY_ITEM']);
            }
            $sale[$keySale]['total_sale'] = $totalVenda;

            if( $keySale == 0 ){
                $vendaMaisCara['sale_id'] = $sale[$keySale]['sale_id'];
                $vendaMaisCara['total_sale'] = $sale[$keySale]['total_sale'];
            }
            elseif( $sale[$keySale]['total_sale'] > $vendaMaisCara['total_sale'] ){
                $vendaMaisCara['sale_id'] = $sale[$keySale]['sale_id'];
                $vendaMaisCara['total_sale'] = $sale[$keySale]['total_sale'];
            }
        }
        
        return $vendaMaisCara['sale_id'];
    }

    public function buscarPiorVendedor() : string
    {
        $piorVendedor = [];
        $sale = $this->dadosId['SALE'];
        foreach ($sale as $keySale => $saleValue) {
            $item = $saleValue['ITEM'];
            $totalVenda = 0;
            foreach ($item as $keyItem => $itemValue) {
                $totalVenda += ( $itemValue['PRICE_ITEM'] * $itemValue['QUANTITY_ITEM']);
            }
            $sale[$keySale]['total_sale'] = $totalVenda;

            if( $keySale == 0 ){
                $piorVendedor['salesman_id'] = $sale[$keySale]['SALESMAN_ID'];
                $piorVendedor['total_sale'] = $sale[$keySale]['total_sale'];
            }
            elseif( $sale[$keySale]['total_sale'] < $piorVendedor['total_sale'] ){
                $piorVendedor['salesman_id'] = $sale[$keySale]['SALESMAN_ID'];
                $piorVendedor['total_sale'] = $sale[$keySale]['total_sale'];
            }
        }
        return $piorVendedor['salesman_id'];
    }
}