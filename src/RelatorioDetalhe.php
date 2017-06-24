<?php namespace TiagoFarias\DataMining;

use TiagoFarias\DataMining\Entidades\{Sale,Item};

/**
 * Responsável por gerar os dados processados que irão compor o relatório
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class RelatorioDetalhe implements IRelatorioDetalhe
{
    private $dados;

    public function __construct( Array $dados )
    {
        $this->dados = $dados;
    }

    public function calcularTotalClientes() : int
    {
        return count($this->dados['CUSTOMER']);
    }

    public function calcularTotalVendedores() : int
    {
        return count($this->dados['SALESMAN']);
    }
    
    public function calcularMediaSalarialVendedores() : float
    {
        $totalSalario = 0;
        foreach ($this->dados['SALESMAN'] as $key => $value) {
            $totalSalario += $value['salary'];
        }
        return $totalSalario / $this->calcularTotalVendedores();
    }

    public function buscarIdVendaMaisCara() : int
    {
        $vendaMaisCara = [];
        $sale = $this->dados['SALE'];
        foreach ($sale as $keySale => $saleValue) {
            $item = $saleValue['ITEM'];
            $totalVenda = 0;
            foreach ($item as $keyItem => $itemValue) {
                $totalVenda += ( $itemValue[Item::ITEM_PRICE] * $itemValue[Item::ITEM_QUANTITY]);
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
        $sale = $this->dados['SALE'];
        foreach ($sale as $keySale => $saleValue) {
            $item = $saleValue['ITEM'];
            $totalVenda = 0;
            foreach ($item as $keyItem => $itemValue) {
                $totalVenda += ( $itemValue[Item::ITEM_QUANTITY] * $itemValue[Item::ITEM_PRICE]);
            }
            $sale[$keySale]['total_sale'] = $totalVenda;

            if( $keySale == 0 ){
                $piorVendedor[Sale::SALESMAN_ID] = $sale[$keySale][Sale::SALESMAN_ID];
                $piorVendedor['total_sale'] = $sale[$keySale]['total_sale'];
            }
            elseif( $sale[$keySale]['total_sale'] < $piorVendedor['total_sale'] ){
                $piorVendedor[Sale::SALESMAN_ID] = $sale[$keySale][Sale::SALESMAN_ID];
                $piorVendedor['total_sale'] = $sale[$keySale]['total_sale'];
            }
        }
        return $piorVendedor[Sale::SALESMAN_ID];
    }
}