<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Sale implements IEntidade
{
    const ID            = 'ID';
    const SALE_ID       = 'sale_id';
    const SALESMAN_ID   = 'salesman_id';

    const SALE_ID_INDEX = 1;

    const ID_INDEX      = 0;
    const IDENTIFICADOR = '003';

    public function __construct() { }

    public function mapper( Array $value ) : Array
    {
        $itemMapper = function( $value ){
            $item = new Item;
            return $item->mapper( $value );
        };
        
        
        return [
            self::ID            => $value[self::ID_INDEX],
            self::SALE_ID       => $value[self::SALE_ID_INDEX],
            self::SALESMAN_ID   => end($value),
            'ITEM'              => $itemMapper($value)
        ];
    }
}