<?php

$ftpsrv = "192.168.23.254";
$ftpuser = "administrador";
$ftppwd = "ASDasd123";
$ftpcon = ftp_connect($ftpsrv);
$lr = ftp_login($ftpcon, $ftpuser, $ftppwd);

if ((!$ftpcon) || (!$lr)) {
    echo 'no se puede conectar';
    exit;
} else {
    echo 'conectado correctamente';
}