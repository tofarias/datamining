<?php namespace TiagoFarias\DataMining\Entidades;

Interface IEntidadeMapper
{
    public function getEntidade(Array $dados) : Array;
}