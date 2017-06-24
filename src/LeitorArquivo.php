<?php namespace TiagoFarias\DataMining;

/**
 * Responsável por ler um arquivo
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class LeitorArquivo
{
    private $pathToFile;
    private $file;

    public function __construct($pathToFile)
    {
        $this->pathToFile = $pathToFile;
    }

    private function abrir()
    {
        try{
            if( !$this->file = fopen($this->pathToFile, "r") ){
                throw new \Exception("erro ao abrir o arquivo!");
            }
        }
        catch( \Exception $ex ){
            throw new \Exception($ex->getMessage());
        }
        
    }

    public function ler()
    {
        $this->abrir();
        while(!feof($this->file))
        {
            $dados[] = explode(',', fgets($this->file));
        }

        fclose($this->file);

        return $dados;
    }
}