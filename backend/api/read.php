<?php

/**
 * Returns the list of policies. 
 * Cela récupérera la liste des politiques de la base de données et les renverra sous forme de réponse JSON. S'il y a une erreur, il renverra une erreur 404.
 */
require 'database.php';

$policies = [];
$sql = "SELECT id, number, amount FROM policies";

if ($result = mysqli_query($con, $sql)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $policies[$i]['id']    = $row['id'];
        $policies[$i]['number'] = $row['number'];
        $policies[$i]['amount'] = $row['amount'];
        $i++;
    }

    echo json_encode($policies);
} else {
    http_response_code(404);
}
