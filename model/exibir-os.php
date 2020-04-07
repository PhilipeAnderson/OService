<?php

require_once 'config.php';

$num_os = $_GET['num'];
$sql = "SELECT * FROM os WHERE numero = '$num_os'";

$resultado = $db->query($sql);

$lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($lista);