<?php
    header('Access-Control-Allow-Origin: *');

    $pdo = require '../../PGConnection.php';

    $arquivos = array();

    $text = $_GET["text"] ?? "";


    $sql = <<<SQL
                SELECT * FROM arquivo
                WHERE nome LIKE ?
                ORDER BY data DESC;
                SQL;

    if($text != ""){
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["'%".$text."%'"]);

        while($row = $stmt->fetch()){
            $arquivos[] = $row;
        }

    } else{
        $arquivos[] = "Input Error!";
    }



    header('Content-type: application/json');
    echo json_encode($arquivos);
?>