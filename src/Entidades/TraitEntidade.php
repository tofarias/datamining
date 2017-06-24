<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * Responsável por identificar os tipos de entidades no arquivo
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
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
