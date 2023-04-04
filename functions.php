<?php

use LDAP\Result;

    function insert($table, $data){
       
        $arrayColunas = [];
        $arrayValues = [];
        unset($data['action']);

        foreach($data as $chave => $value){
            $arrayColunas[] = $chave;
            $arrayValues[] = $value;
        }

        $stringColunas = implode("`, `", $arrayColunas);
        $query = "INSERT INTO $table (`$stringColunas`)";

        $stringValues = implode("', '", $arrayValues);
        $query .= " VALUES ('$stringValues')";

        global $conn;    
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        return $result;
    }

    function select($table){

        $query = "SELECT * FROM $table";

        global $conn;    
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $products = [];
		while($row = mysqli_fetch_assoc($result)){
			$products[] = $row;
		}
        return $products;
    }

    function update( $data){
       
        $arrayColunas = [];
        $arrayValues = [];
        $id=$data['id'];
        $table=$data['action'];
        unset($data['action']);
        unset($data['id']);

        $arrayTest = [];

        foreach($data as $chave => $value){
            $arrayColunas[] = $chave;
            $arrayValues[] = $value;
            $arrayTest[]= "`$chave`='$value'";
        }

        $stringColunas = implode(", ", $arrayTest);

        $query = "UPDATE `$table` SET  $stringColunas WHERE  `id_$table`=$id";

        global $conn;    
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        return $result;
    }

?>