<?php
header('Content-Type: application/json');

include_once('dao/DaoUsuario.php');
include_once('dao/DaoJogo.php');
// session_start();
// $daousuario = new DaoUsuario();
// $usuario = $daousuario->getUsuario($_SESSION['id']);
// Usuario::checkPermissao(1);

$idUsuario = $_GET['usuario'];
$idJogo = $_GET['jogo'];

$daojogo = new DaoJogo();
echo json_encode($daojogo->insereJogada($idUsuario, $idJogo));
