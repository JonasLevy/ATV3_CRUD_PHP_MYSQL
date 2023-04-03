<?php
    if ($_POST) {
      $dados = $_POST;

      $string = implode(" - ", $dados );
      $arquivo = fopen("fornecedor.txt" , "a+");
      fwrite($arquivo, $string."\n");
      fclose($arquivo);
    };
    header("location: fornecedores.php")

    ?>