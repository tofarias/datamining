<?php namespace TiagoFarias\DataMining\Entidades;

class Salesman
{
    const ID        = 'ID';
    const CPF       = 'cpf';
    const NAME      = 'name';
    const SALARY    = 'salary';
    
    const ID_INDEX        = 0;
    const CPF_INDEX       = 1;
    const NAME_INDEX      = 2;
    const SALARY_INDEX    = 3;

    const IDENTIFICADOR = '001';

    private $data;
    private $dados;

    public function __construct()
    {
        $this->dados = Array();
    }

    public function findAll(Array $data) : Array
    {   
        $salesman = Array();
        foreach ($data as $key => $value){

            $temp = $this->mapper( $value );

            if( !empty($temp) ){
                $salesman[] = $temp;
            }
        }

        return $salesman;
    }

    public function mapear() : Array
    {
        if( $this->isSalesman() ){
            return [
                self::ID        => $this->dados[self::ID_INDEX],
                self::CPF       => $this->dados[self::CPF_INDEX],
                self::NAME      => $this->dados[self::NAME_INDEX],
                self::SALARY    => $this->dados[self::SALARY_INDEX],
            ];
        }

        return [];
    }

    public function mapper( Array $value ) : Array
    {
        return [
            self::ID        => $value[self::ID_INDEX],
            self::CPF       => $value[self::CPF_INDEX],
            self::NAME      => $value[self::NAME_INDEX],
            self::SALARY    => (float) $value[self::SALARY_INDEX]
        ];
    }

    public static function isSalesman( )
    {
        return self::IDENTIFICADOR == $this->dados[self::ID_INDEX];
    }
}