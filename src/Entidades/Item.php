<?php namespace TiagoFarias\DataMining\Entidades;

class Item// extends Entidade
{
    const ID_ITEM        = 'id_item';
    const QUANTITY_ITEM  = 'quantity_item';
    const PRICE_ITEM     = 'price_item';

    //const ID_ITEM_INDEX = 1;

    //const IDENTIFICADOR = '003';

    private $data;

    public function __construct()
    {
        $this->data = Array();
    }

    public function findAll(Array $data) : Array
    {
        $sale = [];
        foreach ($data as $key => $value){
            $data = $this->mapper( $value );

            if( !empty($data) ){
                $sale[] = $data;
            }
        }
        return $sale;
    }

    public function mapper( Array $value ) : Array
    {
        $linha = implode(',', $value);

        $First = "[";
        $Second = "]";

        $Firstpos=strpos($linha, $First);
        $Secondpos=strpos($linha, $Second);

        $itensDaVenda = array_map('trim',explode(',',substr($linha , $Firstpos+1, $Secondpos-$Firstpos-1)));

        $itens = [];
        foreach ($itensDaVenda as $key => $itemDaVenda) {
            $itemDaVendaExplode = explode('-',$itemDaVenda);
            
            $itens[$key]['ID_ITEM']         = $itemDaVendaExplode[0];
            $itens[$key]['QUANTITY_ITEM']   = filter_var($itemDaVendaExplode[1], FILTER_SANITIZE_NUMBER_INT);
            $itens[$key]['PRICE_ITEM']      = filter_var($itemDaVendaExplode[2], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        }
        return $itens;
    }

    protected function isSale( $id )
    {
        return self::IDENTIFICADOR == $id;
    }
}