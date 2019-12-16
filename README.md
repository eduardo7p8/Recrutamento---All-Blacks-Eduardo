# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) (v5) CSS
framework by default. You can, however, replace it with any other library or
custom styles.



## SCRIPT BANCO MYSql

CREATE TABLE `all-backs`.`clientes` (
  `idcliente` INT NOT NULL,
  `nome` VARCHAR(180) NULL,
  `documento` VARCHAR(100) NULL,
  `cep` VARCHAR(20) NULL,
  `endereco` VARCHAR(180) NULL,
  `bairro` VARCHAR(50) NULL,
  `cidade` VARCHAR(100) NULL,
  `uf` VARCHAR(10) NULL,
  `telefone` VARCHAR(25) NULL,
  `email` VARCHAR(180) NULL,
  `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` DATETIME NULL,
  `st_ativo` CHAR(1) NULL,
  `st_registro_ativo` ENUM('S', 'N') NULL,
  PRIMARY KEY (`idcliente`));




CREATE TABLE `all-backs`.`arquivos` (
  `idarquivo` INT NOT NULL,
  `no_doc` VARCHAR(255) NULL,
  `no_documento_original` VARCHAR(255) NULL,
  `ext_documento` VARCHAR(8) NULL,
  `path_documento` LONGTEXT NULL,
  `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` DATETIME NULL,
  PRIMARY KEY (`idarquivo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


## Aplicação

Com um layout simples, porem funcional, temos no menu lateral, as opções, Cliente, Disparo de emails, e configurações, sistemas feito todo com auxilio Do CakePHP3, e algumas funções java script, e bibliotecas próprias do php, utilizei o WampServer para rodar minha aplicação.

# Cliente
Menu onde se encontra toda parte de criação, edição e exclusão e visualização de um cliente.

# Disparo de correio eletrônico
Menu para o envio de e-mail para os clientes, corpo de email apenas para texto, com um auxilio de uma option com os correio eletrônico dos respectivos clientes, para um ou vario. Utilizei as configurações do PHPMailer e WampServer juntamente com minha própria conta de email(GMAIL) para o disparo de e-mail, pois seria mais facil o desenrolar para uma finalidade de teste ao invez de ter todas a configuração do mail function e SMTP.

# Configurações
Area para uploado do xml, de atualização dos dados automático, no desafio falou sobre uma planilha excel onde era feito o controle, vendo que os dados, do xml batoam com o do excel ficou bem tranquilo atualizar os dados de uma so vez, sendo tratado documento com unique, e validação se o cliente esta ativo ou não.
Por fim para popular o banco automaticamente pegando dados do excel, não consegui fazer direto com o excel em si, mas alterando a extensão de xlsx, ou xls, para xml consegue se cadastrar toda a planilha no banco atraves do menu configurações. Aparentemente um gato, mas esse feito seria feito so uma vez pois as próximas atualizações seriam com o xml em si que se receber da loja virtual

