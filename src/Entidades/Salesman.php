<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class Salesman
{
    use TraitSanitize;

    const ID        = 'id';
    const CPF       = 'cpf';
    const NAME      = 'name';
    const SALARY    = 'salary';
    
    const ID_INDEX        = 0;
    const CPF_INDEX       = 1;
    const NAME_INDEX      = 2;
    const SALARY_INDEX    = 3;

    const IDENTIFICADOR = '001';

    public function __construct(){ }

    public function mapper( Array $value ) : Array
    {
        return [
            self::ID        => $value[self::ID_INDEX],
            self::CPF       => $value[self::CPF_INDEX],
            self::NAME      => $value[self::NAME_INDEX],
            self::SALARY    => $this->sanitizeNumberFloat($value[self::SALARY_INDEX])
        ];
    }
}