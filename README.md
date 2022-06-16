# Desafio Biblioteca

### Introdução

Este desafio foi retirado da plataforma **DevChallenge**, Com objetivo de desenvolver prática no backend.

### Desafio 

Desenvolver um backend para um sistema de gerenciamento de uma Biblioteca!

## Requisitos:

### Rotas da aplicação:

[POST] /obras : A rota deverá receber titulo, editora, foto, e autores dentro do corpo da requisição. Ao cadastrar um novo projeto, ele deverá ser armazenado dentro de um objeto no seguinte formato:
```js
{ 
  'id': 1, 
  'titulo': 'Harry Potter', 
  'editora': 'Rocco',
  'foto': 'https://i.imgur.com/UH3IPXw.jpg', 
  'autores': ["JK Rowling", "..."]
}
```
[GET] /obras/ : A rota deverá listar todas as obras cadastradas

[PUT] /obras/🆔 : A rota deverá atualizar as informações de titulo, editora, foto e autores da obra com o id presente nos parâmetros da rota

[DELETE] /obras/🆔 : A rota deverá deletar a obra com o id presente nos parâmetros da rota

## Techs: 
* PHP 8.0.17:
* Composer;
  > Gerenciador de pacotes.
* Slim Framework;
  > Micro Framework PHP gerenciador de Rotas.
* Illuminate Database;
  > Componente retirado do Framework Laravel, com objetivo de gerenciar a conexão e as transações com o Banco de Dados.
