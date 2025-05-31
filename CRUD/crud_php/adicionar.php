<?php include "conexao.php"; ?>

<h2>Adicionar Usuário</h2>
<form method="POST">
  Nome: <input type="text" name="nome" required><br>
  Email: <input type="email" name="email" required><br>
  <button type="submit">Salvar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $conn->query("INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')");
  echo "Usuário adicionado!";
  echo "<br><a href='index.php'>Voltar</a>";
}
?>