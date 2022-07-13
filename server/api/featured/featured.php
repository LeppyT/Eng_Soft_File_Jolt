<?php
    $pdo = require 'PGConnection.php';

    $sql = <<<SQL
    SELECT * FROM arquivo
    ORDER BY qtd_downloads DESC;
    SQL;

    $stmt = $pdo->query($sql);
    $arquivos = array();

    while($row = $stmt->fetch()){
        $arquivos[] = $row;
    }

    header('Content-type: application/json');
    echo json_encode($arquivos);
?>