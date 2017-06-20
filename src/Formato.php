<?php namespace TiagoFarias\DataMining;

abstract class Formato
{
    protected function isSalesman( $value )
    {
        return Salesman::IDENTITY == $value;
    }

    protected abstract function mapper(Array $value) : Array;

    public abstract function findAll(Array $data) : Array;
}