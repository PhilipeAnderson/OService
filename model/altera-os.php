<?php

require_once 'config.php';

$data = new DateTime();
$numero = $_POST['num'];
$status = $_POST['status'];
$comentario = $_POST['comentario'];

$sql = "UPDATE os SET data_alteracao = '".$data->format('Y-m-d H:i:s')."', comentario = '$comentario', status = '$status' WHERE numero = $numero";

$status = $db->exec($sql);

if($status > 0)
{
    
echo'{"status":"ok"}';

}else{
    
echo'{"status":"erro",'
    . ' "msg": "O servidor está insdiponível no momento"}';

}
