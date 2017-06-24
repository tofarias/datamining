<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Item implements IEntidade
{
    use TraitSanitize;

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
            $itens[$key][self::ITEM_QUANTITY]   = $this->sanitizeNumberInt($itemDaVendaExplode[1]);
            $itens[$key][self::ITEM_PRICE]      = $this->sanitizeNumberFloat($itemDaVendaExplode[2]);
        }
        return $itens;
    }
}