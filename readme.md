Descrição do Problema
Construa um sistema em PHP para análise de dados, onde o mesmo deverá permitir:
→ importar arquivos de texto;
→ ler e analisar os dados dos arquivos;
→ gerar um relatório.

Processamento dos dados
O sistema deve ler somente arquivos com extensão .dat , localizados em um diretório, como
%HOMEPATH%/data/in . Depois de processados, o sistema deve gerar um arquivo de saída seguindo
o formato {file_name}.done.dat em outro diretório, como %HOMEPATH%/data/out.
Resultado
O arquivo processado deve apresentar como resultados a quantidade de clientes e de vendedores
informados na entrada, a média salarial dos vendedores, o ID da venda mais cara, bem como o pior
vendedor.