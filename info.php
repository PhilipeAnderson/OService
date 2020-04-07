<?php

phpinfo();

$salt = "netscape";
$senha = sha1('123456'.$salt);

echo $senha;