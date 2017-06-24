<?php namespace TiagoFarias\DataMining;

/**
 * Abstração das regras
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
interface IImportaVendas
{
    public function importarArquivosDeTexto();

    public function lerAnalisarDadosDosArquivos();

    public function gerarRelatorio();
}