# Ponderada Adalove CrudsVitto

Esta atividade é uma aplicação PHP simples que permite a inserção e visualização de dados em uma tabela chamada `Cruds` em um banco de dados MariaDB hospedado na AWS. A aplicação foi baseada em um tutorial da AWS, adaptado para criar e gerenciar dados de CRUDs.

Link do vídeo: https://www.youtube.com/watch?v=NApLsMAbyP4

## Visão Geral

A aplicação consiste em uma única página PHP chamada `CrudsVitto.php`, que se conecta a um banco de dados MariaDB em uma instância EC2 na AWS. O código é responsável por verificar se a tabela `Cruds` existe no banco de dados e, caso não exista, criar essa tabela. A página também oferece uma interface para adicionar novos registros à tabela e visualizar os dados já inseridos.

## Funcionalidades

- **Criação da Tabela:** A aplicação verifica se a tabela `Cruds` já existe no banco de dados. Se não existir, a tabela é criada com os seguintes 4 campos:
  - `ID`: Identificador único.
  - `Nome`: Nome associado ao registro (VARCHAR 45).
  - `CrudsFeitos`: Número inteiro representando a quantidade de CRUDs feitos.
  - `TarefasFinalizadas`: Campo booleano indicando se as tarefas foram finalizadas.

- **Inserção de Dados:** Através de um formulário simples, é possível adicionar novos registros à tabela `Cruds`, preenchendo os campos `Nome`, `CrudsFeitos` e `TarefasFinalizadas`.

- **Visualização de Dados:** Os dados existentes na tabela `Cruds` são exibidos em uma tabela HTML abaixo do formulário de inserção.

## Estrutura do Projeto

- **CrudsVitto.php**: A página PHP principal que implementa todas as funcionalidades descritas acima. O código conecta-se ao banco de dados, verifica a existência da tabela, permite a inserção de dados e exibe os registros existentes.

## Passo a Passo de Implementação

1. **Criação da Instância EC2**: Foi criada uma instância EC2 na AWS para hospedar o servidor web (Apache) e executar o código PHP.

2. **Configuração do Banco de Dados**: Um banco de dados MariaDB foi configurado na AWS, com as credenciais necessárias para conexão definidas em um arquivo de configuração (`dbinfo.inc`).

3. **Desenvolvimento do Código PHP**: O arquivo `CrudsVitto.php` foi desenvolvido com base em um tutorial da AWS, adaptado para criar e manipular a tabela `Cruds`. A função `VerifyCrudsTable` é responsável por verificar e criar a tabela, caso não exista. O código também inclui funções para adicionar dados e exibir o conteúdo da tabela.

4. **Deploy na EC2**: O arquivo PHP foi carregado na instância EC2, que se conecta ao banco de dados MariaDB na AWS.

## Como Usar

1. Acesse a URL da instância EC2 onde o arquivo `CrudsVitto.php` está hospedado, mas apenas se o learner lab estiver de pé 😅.
2. No formulário, insira os dados nos campos `Nome`, `CrudsFeitos` e marque a caixa `TarefasFinalizadas` se aplicável.
3. Clique em "Add Data" para adicionar o registro à tabela.
4. Abaixo do formulário, visualize a tabela `Cruds` com todos os registros existentes.

## Requisitos

- Instância EC2 com servidor Apache e suporte a PHP.
- Banco de dados MariaDB configurado na AWS.
- Acesso à internet para conectar a instância EC2 ao banco de dados MariaDB.

## Conclusão

Este projeto exemplifica como criar uma aplicação web simples para gerenciar dados em um banco de dados MariaDB na AWS, utilizando PHP em uma instância EC2. A aplicação automatiza a criação da tabela e oferece uma interface básica para inserção e visualização de dados.
