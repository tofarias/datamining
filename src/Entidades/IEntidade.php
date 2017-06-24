<?php namespace TiagoFarias\DataMining\Entidades;

Interface IEntidade
{
    public function mapper( Array $value ) : Array;
}