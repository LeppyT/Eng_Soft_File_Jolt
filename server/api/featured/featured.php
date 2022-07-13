<?php
    $pdo = require '../../PGConnection.php';

    $arquivos = array();
    $times = array();
    $downloads = array();
    $votes = array();

    $time = $_GET["time"] ?? "";
    $download = $_GET["downloads"] ?? "";
    $vote = $_GET["votes"] ?? "";

    $sql_time = <<<SQL
                SELECT * FROM arquivo
                ORDER BY data DESC;
                SQL;

    $sql_downloads = <<<SQL
                    SELECT * FROM arquivo
                    ORDER BY qtd_downloads DESC;
                    SQL;

    $sql_votes = <<<SQL
                SELECT * 
                FROM arquivo AR JOIN avalia AV ON
                    AR.identificador = AV.identificador_criador
                ORDER BY nota DESC;
                SQL;

    if($time != ""){
        $stmt = $pdo->query($sql_time);

        while($row = $stmt->fetch()){
            $times[] = $row;
        }

        $arquivos[] = $times;
    }

    if($download != ""){
        $stmt = $pdo->query($sql_downloads);

        while($row = $stmt->fetch()){
            $downloads[] = $row;
        }

        $arquivos[] = $downloads;
    }

    if($vote != ""){
        $stmt = $pdo->query($sql_votes);

        while($row = $stmt->fetch()){
            $votes[] = $row;
        }

        $arquivos[] = $votes;
    }



    header('Content-type: application/json');
    echo json_encode($arquivos);
?>