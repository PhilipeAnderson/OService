<?php

require_once 'config.php';

$solicitante = $_SESSION['usuario']['nome'];
$tipo = $_SESSION['usuario']['tipo'];

$departamento = (isset($_GET['departamento'])) ? $_GET['departamento'] : '';
$status = (isset($_GET['status'])) ? $_GET['status'] : '';
$num = (isset($_GET['num'])) ? $_GET['num'] : '';

$filtro = ($tipo == 'admin') ? "WHERE solicitante <> '' " : "WHERE solicitante = '$solicitante' ";

$filtro .= ($departamento != '') ? " AND departamento = '$departamento' " : "";
$filtro .= ($status != '') ? " AND status = '$status' " : "";

$filtro .= ($num != '') ? " AND numero like '$num%' ": "";



$sql = "SELECT * FROM os $filtro ORDER BY data DESC";
//echo $sql;
$resultado = $db->query($sql);

$lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($lista);