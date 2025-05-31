<?php
include "conexao.php";
$id = $_GET["id"];
$usuario = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $conn->query("UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id");
  header("Location: /crud_php/index.php");
  exit;
}
?>

<h2>Editar Usuário</h2>
<form method="POST">
  Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br>
  Email: <input type="email" name="email" value="<?= $usuario['email'] ?>"><br>
  <button type="submit">Salvar</button>
</form>