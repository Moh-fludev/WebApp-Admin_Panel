<?php

function client_get_all($db){

    $sql = 'select * from client';

    $requete = $db -> prepare($sql);
    $requete -> execute();

    return $requete;
}