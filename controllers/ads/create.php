<?php

//So esta disponivel para quem está logado caso contrario é redirecionado para a pagina de login

//Form com os requesitos necessários para enviar para a base de dados (ver tabela)

//Ir buscar as categorias para verificar se a categoria selecionada é igual a da base de dados

//Sanitizar os campos do formulario

//Tratar do ficheiro (img) que tem de ser inserida -> ver finfo e ficheiro da aula

//criar método no model para criar uma anuncio (insert)

//Validar os campos no model

//Inserir

//Caso seja inserido

//Ter área de visualização de ads criados

if(isset($_SESSION["user_name"])) {

  require("views/adscreate.php");

} else {
  header("Location: /login");
  exit;
}