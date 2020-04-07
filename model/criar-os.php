<?php

require_once 'config.php';

$data = new DateTime();
$status= "Nova";

$solicitante = $_SESSION['usuario']['nome'];
$departamento = $_POST['departamento'];
$solicitacao= $_POST['solicitacao'];

$sql = "INSERT INTO os (solicitante, data, departamento, status, solicitacao) VALUES ('$solicitante', '".$data->format('Y-m-d H:i:s')."', '$departamento', '$status', '$solicitacao')";

$status = $db->exec($sql);

if($status > 0)
{
    
echo'{"status":"ok"}';

}else{   
    
echo'{"status":"erro",'
    . ' "msg": "O servidor está insdiponível no momento"}';

}