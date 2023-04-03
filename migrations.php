<?php 

include_once("conect.php");

function createTableProdutos(){
    $query = "
        CREATE TABLE IF NOT EXISTS `produtos` (
            `id_prod` INT(9) PRIMARY KEY AUTO_INCREMENT,
            `nome_prod` VARCHAR(50),
            `estoque_prod` INT(9),
            `preço_prod` FLOAT(9,2),
            `data_cadastro_prod` TIMESTAMP DEFAULT NOW()
        );
    ";

    global $conn;

    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo $result;
}

function createTableFornecedores(){
    $query = "
        CREATE TABLE IF NOT EXISTS `fornecedor` (
            `id_fornecedor` INT(9) PRIMARY KEY AUTO_INCREMENT,
            `nome_fornecedor` VARCHAR(50),
            `razao_social_fornecedor` VARCHAR(50),
            `cnpj_fornecedor` INT(15),
            `data_cadastro_fornecedor` TIMESTAMP DEFAULT NOW()
        );
    ";

    global $conn;

    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo $result;
}

function createTableClientes(){
    $query = "
        CREATE TABLE IF NOT EXISTS `cliente` (
            `id_cliente` INT(9) PRIMARY KEY AUTO_INCREMENT,
            `nome_cliente` VARCHAR(50),
            `email_cliente` VARCHAR(50),
            `cpf_cliente` VARCHAR(12),
            `phone_cliente` VARCHAR(12),
            `data_cadastro_fornecedor` TIMESTAMP DEFAULT NOW()
        );
    ";

    global $conn;

    $result= mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo $result;
}

function migration(){
    createTableProdutos();
    createTableFornecedores();
    createTableClientes();
}

migration()

?>