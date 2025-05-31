<?php
include "conexao.php";
$id = (int) $_GET["id"];
$conn->query("DELETE FROM usuarios WHERE id=$id");
header("Location: /crud_php/index.php");
exit;