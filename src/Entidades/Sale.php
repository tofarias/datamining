<?php namespace TiagoFarias\DataMining\Entidades;

class Sale
{
     const ID        = 'ID';
    const SALE_ID = 'sale_id';

    const SALE_ID_INDEX = 1;

    const ID_INDEX        = 0;
    const IDENTIFICADOR = '003';

    private $data;
    private $itens;

    public function __construct()
    {
        $this->data     = Array();
        $this->itens    = Array();
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
        $item = new Item;
        $i = $item->mapper( $value );
        
        return [
            self::ID        => $value[self::ID_INDEX],
            self::SALE_ID   => $value[self::SALE_ID_INDEX],
            'SALESMAN_ID'   => end($value),
            'ITEM' => $i
        ];
    }

    /**
     * Verifica se é um registro do tipo Sale
     * @param int $id
     */
    protected function isSale( $id )
    {
        return self::IDENTIFICADOR == $id;
    }
}