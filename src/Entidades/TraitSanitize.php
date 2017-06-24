<?php namespace TiagoFarias\DataMining\Entidades;

/**
 * Responsável por higienizar os dados do arquivo
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
trait TraitSanitize
{
    public function sanitizeNumberFloat($numero)
    {
        return filter_var($numero, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }

    public function sanitizeNumberInt($numero)
    {
        return filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
    }
}
