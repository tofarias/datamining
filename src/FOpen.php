<?php namespace TiagoFarias\DataMining;

class FOpen
{
    private $pathToFile;
    private $file;
    private $dados;

    public function __construct($pathToFile)
    {
        $this->pathToFile = $pathToFile;
        $this->file = null;
    }

    private function abrir()
    {
        $this->file = fopen("in.dat", "r") or exit("erro ao abrir o arquivo!");
    }

    public function ler()
    {
        $this->abrir();
        while(!feof($this->file))
        {
            $this->dados[] = explode(',', fgets($this->file));
        }

        fclose($this->file);

        return $this;
    }

    public function getDados()
    {
        return $this->dados;
    }
}