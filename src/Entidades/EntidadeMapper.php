<?php namespace TiagoFarias\DataMining\Entidades;

use TiagoFarias\DataMining\Entidades\TraitEntidade;

class EntidadeMapper
{
    use TraitEntidade;

    private $dados;

    public function __construct(){ }

    public function getEntidade(Array $dados)
    {
        $entidade = null;
        $identificador = $dados[0];
        
        if( $this->isSalesman($identificador) ){
            $salesman = new Salesman;
            $entidade['SALESMAN'] = $salesman->mapper($dados);
        }
        elseif( $this->isCustomer($identificador) ){
            $customer = new Customer;
            $entidade['CUSTOMER'] = $customer->mapper( $dados );
        }
        elseif( $this->isSale($identificador) ){
            $sale = new Sale;
            $entidade['SALE'] = $sale->mapper( $dados );
        }

        
        
        return $entidade;
    }
}