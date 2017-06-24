<?php

include __DIR__.'/../bootstrap.php';

use TiagoFarias\DataMining\{FOpen,Relatorio};
use TiagoFarias\DataMining\Entidades\{Salesman, Customer, Sale, Fabrica, EntidadeMapper};



$arquivoIn = new FOpen('in.dat');
$relatorio = new Relatorio($arquivoIn);