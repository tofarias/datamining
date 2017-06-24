<?php namespace TiagoFarias\DataMining\Entidades;

class Customer
{
    const ID            = 'ID';
    const CNPJ          = 'cnpj';
    const NAME          = 'name';
    const BUSINES_AREA  = 'business_area';
    
    const ID_INDEX              = 0;
    const CNPJ_INDEX            = 1;
    const NAME_INDEX            = 2;
    const BUSINES_AREA_INDEX    = 3;

    const IDENTIFICADOR = '002';

    private $data;

    public function __construct()
    {
        $this->data = Array();
    }

    public function findAll(Array $data) : Array
    {
        foreach ($data as $key => $value){
            $data = $this->mapper( $value );

            if( !empty($data) ){
                $this->data[] = $data;
            }
        }
        return $this->data;
    }

    public function mapper( Array $value ) : Array
    {
        return [
                self::ID            => $value[self::ID_INDEX],
                self::CNPJ          => $value[self::CNPJ_INDEX],
                self::NAME          => $value[self::NAME_INDEX],
                self::BUSINES_AREA  => $value[self::BUSINES_AREA_INDEX],
            ];
    }

    protected function isCustomer( $value )
    {
        return self::IDENTIFICADOR == $value;
    }
}