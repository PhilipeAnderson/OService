<?php

require_once 'config.php';

$salt = 'netscape';

$email = $_POST['email'];
$senha   = sha1($_POST['senha'] . $salt);

$sql = "SELECT * FROM `usuarios` WHERE `login` = '$email' AND `senha` = '$senha'";

$resultado = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado) > 0) {
    //Exemplo de como seria com cookie = setcookie('os-login', 'logado', 0, '/', 'localhost');
    $_SESSION['usuario'] = $resultado[0];
    echo '{"status": "ok",'
        . '"tipo": "' . $_SESSION['usuario']['tipo'] . '"}';
} else {
    echo '{"status": "error", "msg": "Usuario não encontrado"}';
}
