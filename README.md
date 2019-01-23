# Treinamento de PHPUnit Básico

Introdução ao PHPUnit, métodos de assert e lógicas básicas
 
Treinamento passado para os estagiários da casa Boltons na Arquivei

## Instalações necessárias

- docker
- docker-compose
- make

## Para subir o projeto

1. Execute o comando `make build` para buildar uma imagem e subir o container do php-fpm
2. Execute o comando `make php` para entrar no container do php-fpm
3. Execute o comando `composer install` para instalar as dependências do projeto

## Para executar os testes unitários

- Execute o comando `make test`
