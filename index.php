<?php
    //echo json_encode(['message' => 'this is a test message']);

    $db_dsn = array( 
        'host' => 'localhost',
        'dbname' => 'users',
        'charset' => 'utf8'
    );

    $dsn = 'mysql:'.http_build_query($db_dsn, '', ';');

    //This are the DB credentials

    $db_user = 'root';
    $db_pass = 'hopalong';

    try{
        $pdo = new PDO($dsn, $db_user, $db_pass);
        //var_dump($pdo);
    } catch (PDOException $exception){
        echo 'Connection Error:'.$exception->getMessage();
        exit();
    }


    $query = 'SELECT * FROM user';

    $getAllUsers = $pdo->prepare($query);
    $getAllUsers->execute();

    $users = $getAllUsers->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);