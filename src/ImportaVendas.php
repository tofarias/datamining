<?php namespace TiagoFarias\DataMining;

use TiagoFarias\DataMining\Entidades\EntidadeMapper;

/**
 * Undocumented class
 * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
 */
class ImportaVendas implements IImportaVendas
{
    const EXTENSAO_VALIDA = 'dat';
    const CAMINHO_ARQUIVO_IN = 'data/in';
    const CAMINHO_ARQUIVO_OUT = 'data/out';

    public $arquivos;
    private $dadosMapeados;

    public function __construct()
    {
        $this->arquivos = Array();
    }

    public function importarArquivosDeTexto()
    {
        foreach (new \DirectoryIterator(self::CAMINHO_ARQUIVO_IN) as $key => $arquivo) {
            
            if( $arquivo->getExtension() == self::EXTENSAO_VALIDA ){
                $this->arquivos[$key]['caminho_arquivo_in']  = self::CAMINHO_ARQUIVO_IN.DIRECTORY_SEPARATOR.$arquivo->getFilename();
                $this->arquivos[$key]['caminho_arquivo_out'] = self::CAMINHO_ARQUIVO_OUT.DIRECTORY_SEPARATOR.$this->renomearArquivoLido( $arquivo->getFilename() );
            }
        }
    }

    public function lerAnalisarDadosDosArquivos()
    {
        foreach ($this->arquivos as $key => $arquivo) {
            $leitorArquivo = new LeitorArquivo( $arquivo['caminho_arquivo_in'] );
            $dadosLidos = $leitorArquivo->ler();

            $this->arquivos[$key]['dados'] = $this->mapearEntidades( $dadosLidos );
        }
    }

    /**
     * Cria índices e agrupa os dados com suas respectivas entidades
     *
     * @param Array $dadosLidos
     * @return Array
     * @author Tiago O. de Farias <tiago.farias.poa@gmail.com>
     */
    private function mapearEntidades( Array $dadosLidos ) : Array
    {
        $entidadeMapper = new EntidadeMapper();
        $entidades = [];

        foreach ($dadosLidos as $key => $dadoLido) {
            $entidade = $entidadeMapper->getEntidade( $dadoLido );
            $entidades[key($entidade)][] = current(array_values($entidade));
        }
        return $entidades;
    }

    private function renomearArquivoLido( $arquivo ) : string
    {
        return str_replace('.dat', '.done.dat', $arquivo);
    }

    public function gerarRelatorio()
    {
        foreach ($this->arquivos as $key => $arquivo) {
            
            $escritorArquivo = new EscritorArquivo($arquivo['caminho_arquivo_out']);
            $relatorioDetalhe = new RelatorioDetalhe( $arquivo['dados'] );

            $relatorio = new Relatorio( $escritorArquivo, $relatorioDetalhe );
            $relatorio->gerar();
        }
    }
}