<?php namespace TiagoFarias\DataMining;

/**
 * Definição das regras
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
Interface IRelatorioDetalhe
{
    public function calcularTotalClientes() : int;

    public function calcularTotalVendedores() : int;

    public function calcularMediaSalarialVendedores() : float;

    public function buscarIdVendaMaisCara() : int;

    public function buscarPiorVendedor() : string;
}