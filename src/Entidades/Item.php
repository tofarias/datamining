<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Item implements IEntidade
{
    const ITEM_ID        = 'item_id';
    const ITEM_QUANTITY  = 'item_quantity';
    const ITEM_PRICE     = 'item_price';

    private $data;

    public function __construct()
    {
        $this->data = Array();
    }

    public function mapper( Array $value ) : Array
    {
        $linha = implode(',', $value);

        $First = "[";
        $Second = "]";

        $Firstpos = strpos($linha, $First);
        $Secondpos = strpos($linha, $Second);

        $itensDaVenda = array_map('trim',explode(',',substr($linha , $Firstpos+1, $Secondpos-$Firstpos-1)));

        $itens = [];
        foreach ($itensDaVenda as $key => $itemDaVenda) {
            $itemDaVendaExplode = explode('-',$itemDaVenda);
            
            $itens[$key][self::ITEM_ID]         = $itemDaVendaExplode[0];
            $itens[$key][self::ITEM_QUANTITY]   = filter_var($itemDaVendaExplode[1], FILTER_SANITIZE_NUMBER_INT);
            $itens[$key][self::ITEM_PRICE]      = filter_var($itemDaVendaExplode[2], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        }
        return $itens;
    }

    protected function isSale( $id )
    {
        return self::IDENTIFICADOR == $id;
    }
}