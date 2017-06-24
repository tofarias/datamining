<?php namespace TiagoFarias\DataMining;

/**
 * Responsável por escrever os dados no arquivo, gerando o relatório.
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class EscritorArquivo
{
    private $caminhoArquivo;
    private $file;

    public function __construct($caminhoArquivo)
    {
        $this->caminhoArquivo = $caminhoArquivo;
    }

    private function criarArquivo()
    {
        $this->file = fopen($this->caminhoArquivo, "w");
    }

    public function escrever( Array $dados ) : bool
    {
        $this->criarArquivo();

        $texto = implode("\n", $dados);

        fwrite($this->file, $texto);
        fwrite($this->file,"\n\nArquivo gerado em: ".date('d/m/Y H:i:s'));
        fclose($this->file);

        return true;
    }
}