<?php namespace TiagoFarias\DataMining\Entidades;

trait TraitEntidade
{
    private function isSalesman( $identificador )
    {
        return $identificador === Salesman::IDENTIFICADOR;
    }

    private function isCustomer( $identificador )
    {
        return $identificador === Customer::IDENTIFICADOR;
    }

    private function isSale( $identificador )
    {
        return $identificador === Sale::IDENTIFICADOR;
    }
}
