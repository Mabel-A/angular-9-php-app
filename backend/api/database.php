<?php
//Ces lignes sont utilisées pour ajouter des en-têtes de réponse tels que CORS et les méthodes autorisées (PUT, GET, DELETE et POST).

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//Ces variables contiennent les informations d'identification qui seront utilisées pour se connecter à la base de données MySQL et le nom de la base de données.

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mydb');

//Cela vous permettra de créer une connexion à la base de données MySQL en utilisant l' mysqliextension

function connect()
{
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno($connect)) {
        die("Failed to connect:" . mysqli_connect_error());
    }

    mysqli_set_charset($connect, "utf8");

    return $connect;
}

$con = connect();
