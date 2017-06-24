<?php namespace TiagoFarias\DataMining;

use TiagoFarias\DataMining\Entidades\Arquivo;

/**
 * Responsável por iniciar a importação de arquivos e gerar o relatório
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class RoboImportaArquivos
{
    private $importaVendas;

    public function __construct()
    {
        $this->importaVendas = new ImportaVendas();
    }

    public function executar()
    {
        $this->importaVendas->importarArquivosDeTexto();
        $this->importaVendas->lerAnalisarDadosDosArquivos();
        $this->importaVendas->gerarRelatorio();
    }
}