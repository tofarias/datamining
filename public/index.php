<?php

include __DIR__.'/../bootstrap.php';

use TiagoFarias\DataMining\RoboImportaArquivos;

try{
    
    $robo = new RoboImportaArquivos;
    $robo->executar();

    echo '['.date('d/m/Y H:i:s').'] Robô executado com sucesso!';

}catch(\Exception $ex){
    echo $ex->getMessage();
}