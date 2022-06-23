# Desafio Biblioteca

### Introdução

Este desafio foi retirado da plataforma **DevChallenge**, Com objetivo de desenvolver prática no backend.

### Desafio 

Desenvolver um backend para um sistema de gerenciamento de uma Biblioteca!

## Requisitos:

### Rotas da aplicação:

[POST] /obras : A rota deverá receber titulo, editora, foto, e autores dentro do corpo da requisição. Ao cadastrar um novo projeto, ele deverá ser armazenado dentro de um objeto no seguinte formato:

Em JSON:
```js
{ 
  'id': 1, 
  'titulo': 'Harry Potter', 
  'editora': 'Rocco',
  'foto': 'https://i.imgur.com/UH3IPXw.jpg', 
  'autores': ["JK Rowling", "..."]
}
```


XML: 
```XML
<book>
    <id>1</id>
    <titulo>Harry Potter</titulo>
    <editora>Rocco</editora>
    <foto>https://i.imgur.com/UH3IPXw.jpg</foto>
    <autores>JK Rowling</autores>
    <autores>...</autores>
</book>
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
* Postman
  > Utilizado para testar e validar os Endpoints.

<h4 align="center"> 
	🚧  Status do desafio: 🚀 Finalizado!  🚧
</h4>

## Link do Desafio

<a href="https://github.com/devchallenge-io/biblioteca-backend" target="_blank">Desafio Biblioteca - DevChallenge</a>
