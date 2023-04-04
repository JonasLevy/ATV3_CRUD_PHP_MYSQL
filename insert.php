<?php
  include_once 'functions.php';
  include_once 'conect.php';
  
  switch ($_POST['action']) {
    case 'produtos':
      $result = insert("`produtos`", $_POST);
      header("location: produto.php");
      break;
    case 'fornecedor':
      $result = insert("`fornecedor`", $_POST);
      header("location: fornecedores.php");
      break; 
    case 'cliente':
      $result = insert("`cliente`", $_POST);
      header("location: cliente.php");
      break; 
    default:
      echo "deu ruim";
      break;
  }

?>
