<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Customer implements IEntidade
{
    const ID            = 'id';
    const CNPJ          = 'cnpj';
    const NAME          = 'name';
    const BUSINES_AREA  = 'business_area';
    
    const ID_INDEX              = 0;
    const CNPJ_INDEX            = 1;
    const NAME_INDEX            = 2;
    const BUSINES_AREA_INDEX    = 3;

    const IDENTIFICADOR = '002';

    public function __construct(){ }

    public function mapper( Array $value ) : Array
    {
        return [
                self::ID            => $value[self::ID_INDEX],
                self::CNPJ          => $value[self::CNPJ_INDEX],
                self::NAME          => $value[self::NAME_INDEX],
                self::BUSINES_AREA  => $value[self::BUSINES_AREA_INDEX],
            ];
    }
}