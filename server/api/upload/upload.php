<?php
    //var/filebank/joao/livro1/0.1/livro.pdf
    header('Access-Control-Allow-Origin: *');

    $pdo = require '../../PGConnection.php';

    $target_dir = "/var/filebank/";

    $arquivos = array();

    $username = $_POST["username"] ?? "";
    //$file = $_POST["file"] ?? "";
    $nome = $_POST["nome"] ?? "";
    /*$descricao = $_POST["descricao"] ?? "";
    $titulo = $_POST["titulo"] ?? "";
    $qtd_downloads = 0;*/

    // Checking whether file exists or not
    if (!file_exists($target_dir . $username . '/' . $nome)) {
    
        // Create a new file or direcotry
        mkdir($target_dir . $username . '/' . $nome, 0777, true);

        $arquivos[] =  "Given file path successfully created";
    }
    else {
        $arquivos[] =  "The Given file path already exists";
    }

    /*if ($username != "" && $file != ""){
        fopen($target_dir . $username . '/' . basename($file),mode)
    }
    else{

    }*/

    /*$sql_time = <<<SQL
                SELECT * FROM arquivo
                ORDER BY data DESC;
                SQL;

    $sql_downloads = <<<SQL
                    SELECT * FROM arquivo
                    ORDER BY qtd_downloads DESC;
                    SQL;

    $sql_votes = <<<SQL
                SELECT *
                FROM avalia AV JOIN (arquivo AR JOIN usuario US ON 
                    US.identificador = AR.identificador)ON
                    AR.identificador = AV.identificador_criador
                ORDER BY nota DESC;
                SQL;

    if($type == "time"){
        $stmt = $pdo->query($sql_time);

        while($row = $stmt->fetch()){
            $arquivos[] = $row;
        }

    } else if($type == "downloads"){
        $stmt = $pdo->query($sql_downloads);

        while($row = $stmt->fetch()){
            $arquivos[] = $row;
        }

    } else if($type == "votes"){
        $stmt = $pdo->query($sql_votes);

        while($row = $stmt->fetch()){
            $arquivos[] = $row;
        }

    } else{
        $arquivos[] = "Input Error!";
    }*/



    header('Content-type: application/json');
    echo json_encode($arquivos);
?>
